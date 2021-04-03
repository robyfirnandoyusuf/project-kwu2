<?php

namespace Modules\Property\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Traits\APITrait;
use Auth;
use DB;

use App\Models\Property;
use Modules\Property\Transformers\PropertyResource;

class APIPropertyController extends Controller
{

    use APITrait;
    private $limit = 10;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();
        try {
            // Create Property
            $property = new Property;
            $property->user_id      = $user->id;
            $property->title        = $request->title;
            $property->desc         = $request->desc;
            $property->district_id  = $request->district_id;
            $property->postal_code  = $request->postal_code;
            $property->address      = $request->address;
            $property->lat          = $request->lat;
            $property->long         = $request->long;
            $property->facilities   = $request->facilities;
            $property->poi          = $request->poi;
            $property->rules        = $request->rules;
            $property->room_total   = $request->room_total;
            $property->type         = $request->type;
            $property->square_meter = $request->square_meter;
            $property->active_status= $request->active_status;
            $property->basic_price  = $request->basic_price;

            $property->save();

            // Create images


            DB::commit();

            $this->success = true;
            $this->data = new PropertyResource($property);
            $this->code = Response::HTTP_CREATED;
        } catch (\Exception $e) {
            DB::rollback();
            $this->success = false;
            $this->message = $e->getMessage();
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->json();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Property $id)
    {
        $this->status = true;
        $this->code = Response::HTTP_OK;
        $this->data = new PropertyResource($id);

        return $this->json();
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
