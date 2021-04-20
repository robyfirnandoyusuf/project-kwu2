<?php

namespace Modules\District\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\RefDistrict;
use App\Traits\APITrait;

class ApiDistrictController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $district = new RefDistrict;
        if ($request->has('city_id'))
            $district = $district->where('city_id', $request->city_id);
        
        $district = $district->get();
        $this->status = true;
        $this->code = \Illuminate\Http\Response::HTTP_OK;
        $this->data = $district;

        return $this->json();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('district::create');
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
    public function show(RefDistrict $district)
    {
        $this->status = true;
        $this->code = \Illuminate\Http\Response::HTTP_OK;
        $this->data = $district;

        return $this->json();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('district::edit');
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
