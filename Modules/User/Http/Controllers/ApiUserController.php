<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use App\Traits\APITrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Auth;

use App\Models\Media;

class ApiUserController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = User::with('media:id,file')->whereId(Auth::id())->first();

        return $this->json();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        try {
            $user = User::find($userId);
            if (!$request->has('password')) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->identity = $request->identity;
                
                if ($request->hasFile('avatar')) {
                    if ($file = $request->avatar->store('/upload', 'public')) {
                        $cols = [
                            'user_id' => Auth::id(),
                            'file' => str_replace('upload/', '', $file),
                            'type' => Media::AVATAR
                        ];
    
                        $this->_clearMedia();
                        $image_id = Media::insertGetId($cols);
                        $user->image_id = $image_id;
                    }
                }
            } else {
                $user->password = \Hash::make($request->password);
            }

            $user->save();
            $this->success = true;
            $this->code = Response::HTTP_OK;
        } catch (\Exception $e) {
            $this->success = false;
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        return $this->json();
    }

    private function _clearMedia() {
        $mediaModel = Media::where(['user_id' => Auth::id(), 'type' => Media::AVATAR]);
        $media = clone $mediaModel;

        $file = $media->pluck('file');
        foreach ($file as $key => $value) {
            Storage::disk('public')->delete('upload/'.$value);
        }

        return $media->delete();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
