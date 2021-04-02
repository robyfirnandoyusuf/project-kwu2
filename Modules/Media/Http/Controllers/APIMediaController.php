<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Traits\APITrait;

use App\Models\Media;
use Modules\Media\Transformers\MediaResource;
use Auth;

class APIMediaController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $media = Media::where('user_id', Auth::user()->id)->paginate(10);

        $this->status = true;
        $this->data = new MediaResource($media);
        $this->status = Response::HTTP_OK;

        return $this->json();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5000|mimes:' . $this->getAllowedFileTypes(),
        ]);
        //
        $user = Auth::user();

        try {
            $mediaName = $this->uploadImage($request->file('image'));
            if ($mediaName != "") {
                $media = new Media;
                $media->user_id   = $user->id;
                $media->file      = $mediaName;
                $media->save();

                $this->status = true;
                $this->data = new MediaResource($media);
                $this->code = Response::HTTP_CREATED;

                goto returnStatement;
            }

        } catch (\Exception $e) {
            $this->status = false;
            $this->message = $e->getMessage();
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

    returnStatement:
        return $this->json();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Media $media)
    {
        $this->status = true;
        $this->message = "Success deleting Image";
        $this->code = Response::HTTP_OK;

        if (!$this->deleteImage('upload/'.$media->file)) {
            $this->status = false;
            $this->message = "Error when deleting Image";
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
            goto returnStatement;
        }

        $media->delete();

        returnStatement:
        return $this->json();
        //
    }

    private function getAllowedFileTypes()
    {
        return str_replace('.', '', config('media.allowed', ''));
    }
}
