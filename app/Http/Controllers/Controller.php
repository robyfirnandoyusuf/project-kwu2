<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Media;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($image): string {
        if ($fileUid = $image->store('/upload', 'public')) {
            return $fileUid;
        }

        return "";
    }

    public function deleteImage($file_path): bool {
        try {
            Storage::disk('public')->delete($file_path);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function checkMediaIDIsUsed($ids): bool {
        $mediaIds = Media::where('id', $ids)->where('is_used', 1)->get();
        if (count($mediaIds) > 0) {
            return true;
        }

        return false;

    }

    public function idorChecker($user_id): bool {
        // IDOR validation
        if (Auth::user()->id == $user_id) {
            return true;
        }
        return false;
    }

    /**
     * Show the specified resource.
     * 
     *  $params = [
     *       'transaction_details' => [
     *          'order_id' => rand(),
     *          'gross_amount' => 10000,
     *      ],
     *       'customer_details' => [
     *          'first_name' => 'budi',
     *         'last_name' => 'pratama',
     *        'email' => 'budi.pra@example.com',
     *       'phone' => '08111222333',
     *  ],
     *];
     * @return Array
     */
    public function getMidtrans($params) {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = (bool)env('MIDTRANS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = (bool)env('MIDTRANS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = (bool)env('MIDTRANS_3DS');
        
        $snapToken = \Midtrans\Snap::createTransaction($params);

        return $snapToken;
    }
}
