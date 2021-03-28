<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $email = $request->email;
        $password = $request->password;
        $user = User::where(['email' => $email]);

        if ($user->count() >= 1) {
            if (\Hash::check($password, $user->first()->password)) {
                $token = JWTAuth::fromUser($user->first());
                $this->success = true;
                $this->code = \Illuminate\Http\Response::HTTP_OK;
                $this->data = ['token' => $token];
            } else {
                $this->success = false;
                $this->code = \Illuminate\Http\Response::HTTP_UNAUTHORIZED;
            }
        } else {
            $this->success = false;
            $this->code = \Illuminate\Http\Response::HTTP_UNAUTHORIZED;
        }

        return $this->json();
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
