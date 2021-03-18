<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Traits\AjaxTrait;

class MediaController extends Controller
{
    use AjaxTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5000|mimes:' . $this->getAllowedFileTypes(),
            // 'attachable_id' => 'required|integer',
            // 'attachable_type' => 'required',
        ]);
        // save the file
        if ($fileUid = $request->file->store('/upload', 'public')) {
            $cols = [
                // 'uid' => ,
                'sid' => $request->sid ?? \Session::get('dz-sess'),
                'file' => str_replace('upload/', '', $fileUid),
            ];

            if (!empty($request->parent_id)) 
                $cols['parent_id'] = $request->parent_id;

            return Image::create($cols);
        }

        $this->data = 'Unable to upload your file.';
        $this->code = \Illuminate\Http\Response::HTTP_BAD_REQUEST;

        return $this->json();
    }

    /**
     * Remove . prefix so laravel validator can use allowed files
     *
     * @return string
     */
    private function getAllowedFileTypes()
    {
        return str_replace('.', '', config('media.allowed', ''));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        try {
            $data = Image::where('file', $file)->delete();
        } catch (\Exception $e) {
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        $this->data = $data;
        return $this->json();
    }
}
