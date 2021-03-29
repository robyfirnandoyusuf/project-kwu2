<?php

namespace Modules\Favorite\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiFavoriteController extends Controller
{
    use APITrait;
    private $limit = 10;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $user = JWTAuth::toUser();
        $favorite = Favorite::with(['property', 'user'])->where('user_id', $user->id)->paginate($this->limit);
        $this->status = true;
        $this->code = \Illuminate\Http\Response::HTTP_OK;
        $this->data = $favorite;

        return $this->json();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // return view('favorite::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $user = JWTAuth::toUser();
        $propId = $request->property_id;
        
        try {
            $favorite = new Favorite;
            $favorite->property_id = $propId;
            $favorite->user_id = $user->id;
            $favorite->save();

            $this->status = true;
            $this->code = \Illuminate\Http\Response::HTTP_OK;
        } catch (\Exception $e) {
            $this->status = false;
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
        return view('favorite::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('favorite::edit');
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
