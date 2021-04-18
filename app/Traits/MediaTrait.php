<?php
namespace App\Traits;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;

trait MediaTrait {
    public function uploadMedia($image, $type, $user) {
        if (!Auth::guest())
            $user = Auth::id();

        if ($fileUid = $image->store('/upload', 'public')) {
            $media = new Media;
            $media->user_id = $user;
            $media->file = $fileUid;
            $media->type = $type;
            $media->save();
            return $media->id;
        }
    }
}