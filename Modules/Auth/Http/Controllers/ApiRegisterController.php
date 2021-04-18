<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\Media;
use App\Models\RefStatus;
use App\Models\User;
use App\Traits\APITrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\MediaTrait;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Media\Http\Controllers\APIMediaController;

class ApiRegisterController extends APIMediaController
{
    use APITrait, MediaTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    /* public function index()
    {
        return view('auth::index');
    } */

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('auth::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeRegister(RegisterRequest $request)
    {
        $image = $request->file('image');
        try {
            $user = new User;
            $user->name = $request->name;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->identity = $request->identity;
            $user->active_status = RefStatus::status('active')->ref;
            $user->save();
            
            $media = $this->uploadMedia($image, Media::AVATAR, $user->id);
            if ($media) {
                $user->find($user->id);
                $user->image_id = $media;
                $user->save();
            }

            $this->success = true;
            $this->code = \Illuminate\Http\Response::HTTP_OK;
        } catch (\Exception $e) {
            $this->success = false;
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->json();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('auth::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('auth::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
