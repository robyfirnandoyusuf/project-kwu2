<?php

namespace Modules\Payment\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Payment;
use App\Models\RefStatus;
use App\Models\Rent;
use App\Models\User;
use App\Models\Withdraw;
use App\Traits\AjaxTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Log;

class PaymentController extends Controller
{
    use AjaxTrait;
    public function withdraw_index()
    {
        $data['title'] = 'Withdraw';
        return view('payment::admin.payment.index', $data);
    }

    public function datatable_withdraw()
    {
        $model = Withdraw::with(['user', 'approveBy'])
                    ->orderBy('created_at', 'desc');
        // dd($model->get()->toArray());
        $dTable = DataTables()->eloquent($model)
            ->addIndexColumn()
            ->editColumn('nama', function ($data) {
                return $data->user->name;
            })
            ->editColumn('nominal', function ($data) {
                return $data->nominal;
            })
            ->editColumn('status', function ($data) {
                return ucfirst(RefStatus::ref($data->status)->title);
            })
            ->editColumn('created_at', function ($data) {
                return $data->dibuat_tgl ? $data->dibuat_tgl : "-";
            })
            ->editColumn('approve_by', function ($data) {
                return !empty($data->approveBy) ? ucfirst($data->approveBy->name) : "-" ;
            })
            ->addColumn('action', function ($data) {
                $btn = "";
                $btn .= '
                        <select class="form-control select-status" data-style="btn btn-primary btn-round" data-size="7" id="'.$data->id.'">
                            <option value="11" '.($data->status == 11 ? "selected" : "").'>Waiting</option>
                            <option value="6" '.($data->status == 6 ? "selected" : "").'>Deny</option>
                            <option value="12" '.($data->status == 12 ? "selected" : "").'>Accept</option>
                        </select>
                        ';
                return $btn;
            })
            ->rawColumns(['action']);

        return $dTable->make(true);
    }

    public function change_status(Withdraw $wd, $status)
    {
        try {
            $wd->status = $status;
            $wd->approve_by = \Auth::id();
            $wd->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('notif_error', 'Gagal merubah status withdrawal');
        }
        
        return redirect()->back()->with('notif_success', 'Berhasil merubah status withdrawal');
    }

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
        $rentStatus = 2;
        $msg = '';
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
                    $msg = "Pembayaran Kos $order_id Sudah Terbayar, Silahkan tunggu konfirmasi kami !";
                    $rentStatus = 1;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            Log::channel('stderr')->debug("Transaction order_id: " . $order_id . " successfully transfered using " . $type);
            $msg = "Pembayaran Kos $order_id Sudah Terbayar !";
            $rentStatus = 1;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            Log::channel('stderr')->debug("Waiting customer to finish transaction order_id: " . $order_id . " using " . $type);
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.");
            $msg = "Pembayaran Kos $order_id Ditolak !";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.");
            $msg = "Pembayaran Kos $order_id Kedaluwarsa !";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            Log::channel('stderr')->debug("Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.");
            $msg = "Pembayaran Kos $order_id Dibatalkan !";
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
            $rent->active_status = $rentStatus;
            $rent->save();
            
            if ($rentStatus == 1)
                $this->_sendNotification([$rent->user_id], $msg);

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

    private function _sendNotification($receiverIds = null, $msg = null)
    {
        $firebaseToken = User::whereIn('id', $receiverIds)->pluck('device_token')->all();
        $SERVER_API_KEY = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'Payment Notification',
                "body" => $msg,
            ]
        ];
        $dataString = json_encode($data);
  
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
  
        $ch = curl_init();
  
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
              
        $response = curl_exec($ch);
    }
}
