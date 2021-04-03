<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Media;

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
}
