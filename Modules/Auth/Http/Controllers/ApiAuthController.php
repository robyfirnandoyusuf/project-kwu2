<?php

namespace Modules\Auth\Http\Controllers;

use Auth;
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
        $this->data = ['token' => $token];

        returnStatement:
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
