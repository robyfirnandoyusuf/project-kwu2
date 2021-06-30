<?php

namespace Modules\Payment\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Payment;
use App\Models\RefStatus;
use App\Models\Rent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function webhook()
    {
        \Midtrans\Config::$isProduction = (bool)env('MIDTRANS_PRODUCTION');
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $refStatus = RefStatus::STATUS_PAYMENT[$transaction];

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    Log::channel('stderr')->debug("Transaction order_id: " . $order_id . " is challenged by FDS");
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    Log::channel('stderr')->debug("Transaction order_id: " . $order_id . " successfully captured using " . $type);
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            Log::channel('stderr')->debug("Transaction order_id: " . $order_id . " successfully transfered using " . $type);
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            Log::channel('stderr')->debug("Waiting customer to finish transaction order_id: " . $order_id . " using " . $type);
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.");
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.");
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.");
        }

        DB::beginTransaction();
        try {
            // $order_id = 'P21063016391223';
            //insert payment
            $payment = Payment::where('code', $order_id)->first();
            $payment->status_payment = $refStatus;
            $payment->payment_response = json_encode((array)$notif);
            $payment->save();
            //insert mutasi penyewa
            $rent = Rent::with('property')->wherePaymentId($payment->id)->first();
            $mPenyewa = Mutasi::whereUserId($rent->user_id)->orderBy('id', 'desc');

            $dbPenyewa = 0;
            $crPenyewa = 0;
            $saldoPenyewa = 0;
            if ($mPenyewa->count() <= 0) { //jika belum ada mutasi artinya saldo 0
                $dbPenyewa = $payment->amount;
                $crPenyewa = $payment->amount;
            }  else {
                $dbPenyewa = $payment->amount;
                $crPenyewa = $payment->amount;
                $saldoPenyewa = $mPenyewa->first()->saldo;
            }
            $mutasi = new Mutasi();
            $mutasi->user_id = $rent->user_id;
            $mutasi->db = $dbPenyewa;
            $mutasi->cr = $crPenyewa;
            $mutasi->saldo = $saldoPenyewa;
            $mutasi->desc = 'Bayar kos '.$payment->code;
            $mutasi->save();

            //insert mutasi pemilik
            $mMitra = Mutasi::whereUserId($rent->property->first()->user_id)->orderBy('id', 'desc');

            $dbMitra = 0;
            $crMitra = 0;
            $saldoMitra = 0;
            if ($mMitra->count() <= 0) {
                $dbMitra = $payment->amount;
                $saldoMitra = $payment->amount;
            }  else {
                $dbMitra = $payment->amount;
                $crMitra = 0;
                $saldoMitra = $mMitra->first()->saldo + $payment->amount;
            } 
            $mutasi = new Mutasi();
            $mutasi->user_id = $rent->property->first()->user_id;
            $mutasi->db = $dbMitra;
            $mutasi->cr = $crMitra;
            $mutasi->saldo = $saldoMitra;
            $mutasi->desc = 'Pembayaran Kos '.$payment->code;
            $mutasi->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
