<?php

namespace Modules\Auth\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use URL;

use Modules\Auth\Http\Requests\UserRequest;

use App\Models\Media;
use App\Models\User;

class ApiAuthController extends Controller
{
    use APITrait;
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if(!$token = JWTAuth::attempt($credentials)) {
                $this->success = false;
                $this->code = \Illuminate\Http\Response::HTTP_UNAUTHORIZED;
                $this->message = "Invalid Credential";

                goto returnStatement;
            }
        } catch (JWTException $e) {
            $this->success = false;
            $this->code = \Illuminate\Http\Response::HTTP_UNAUTHORIZED;
            
            goto returnStatement;
        }

        if (Auth::user()->active_status != 1) {
            $this->success = false;
            $this->code = \Illuminate\Http\Response::HTTP_UNAUTHORIZED;
            $this->message = "Inactive Account";
            goto returnStatement;
        }

        $this->success = true;
        $this->code = \Illuminate\Http\Response::HTTP_OK;
        $user = User::with('media:id,file')->whereId(Auth::id())->first();
        if ($user->media) {
            $user->media->file = URL::to('/storage/'.$user->media->file);
        }

        $this->data = [
            'token' => $token,
            'user' => $user
        ];

        returnStatement:
        return $this->json();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function get_user_logged()
    {
        $user = User::with('media:id,file')->whereId(Auth::id())->first();
        if ($user->media) {
            $user->media->file = URL::to('/storage/'.$user->media->file);
        }
        
        $this->success = true;
        $this->code = \Illuminate\Http\Response::HTTP_OK;
        $this->data = $user;

        return $this->json();
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
}
