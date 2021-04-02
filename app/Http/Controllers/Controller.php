<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($image) {
        if ($fileUid = $image->store('/upload', 'public')) {
            return $fileUid;
        }

        return "";
    }

    public function deleteImage($file_path) {
        try {
            Storage::disk('public')->delete($file_path);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
