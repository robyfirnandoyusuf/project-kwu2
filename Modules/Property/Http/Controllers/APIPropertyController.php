<?php

namespace Modules\Property\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Traits\APITrait;
use Auth;
use DB;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Media;
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
        $this->validateProperty($request);

        $user = Auth::user();

        DB::beginTransaction();
        try {
            // Create Property
            $property = new Property;
            
            $this->createOrUpdateProperty($property, $request, $user->id);
            $this->createPropertyImage($request->property_image_ids, $property->id, $user->id);

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

    returnStatement:
        return $this->json();
    }

    /**
     * Show the specified resource.
     * @param Property $property
     * @return Renderable
     */
    public function show(Property $property)
    {

        // IDOR validation
        if (Auth::user()->id != $property->user_id) {
            $this->success = false;
            $this->code = Response::HTTP_BAD_REQUEST;
            return $this->json();    
        }
        
        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = new PropertyResource($property);

        return $this->json();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Property $property
     * @return Renderable
     */
    public function update(Request $request, Property $property)
    {
        $this->validateProperty($request);

        $user = Auth::user();

        DB::beginTransaction();
        try {
            // Update Property
            $this->createOrUpdateProperty($property, $request, $user->id);

            // Delete Property Images
            PropertyImage::where('property_id', $property->id)->delete();

            // Create images
            $this->createPropertyImage($request->property_image_ids, $property->id, $user->id);

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

    returnStatement:
        return $this->json();

    }

    /**
     * Remove the specified resource from storage.
     * @param Property $property
     * @return Renderable
     */
    public function destroy(Property $property)
    {
        //
    }

     /**
     * =====================================================================================================
     * HELPER FOR PROPERTY
     * =====================================================================================================
     */

    private function validateProperty(Request $request) {
        // Validate Request
        $validatorRule = [
            'title'         => 'required',
            'desc'          => 'required',
            'district_id'   => 'required|exists:ref_districts,id',
            'postal_code'   => 'required',
            'address'       => 'required',
            'lat'           => 'required',
            'long'          => 'required',
            // 'facilities'    => 'required',
            // 'poi'           => 'required',
            // 'rules'         => 'required',
            'room_total'    => 'required|min:1',
            'type'          => 'required|exists:ref_types,id',
            'square_meter'  => 'required',
            'active_status' => 'required|exists:ref_status,id',
            'basic_price'   => 'required',
            'property_image_ids' => 'required|array|min:1|exists:property_images,id'
        ];

        $validatorMessage = [];

        $validator = Validator::make($request->all(), $validatorRule, $validatorMessage);
        $errorString = implode(", ",$validator->messages()->all());

        if ($validator->fails()) {
            $this->success = false;
            $this->data = $validator->errors();
            $this->code = Response::HTTP_BAD_REQUEST;
            $this->message = $errorString;
            return $this->json();
        }
    }

    private function createPropertyImage($imageIds, $propertyId, $userId) {
        // Create images
        foreach( $imageIds as $key => $data ) {
            $image = new PropertyImage;
            $image->property_id = $propertyId;
            $image->user_id = $userId;
            $image->media_id = $data;
            $image->sequence = $key;
            $image->save();
        }
    }

    private function createOrUpdateProperty($property, $request, $user_id) {
        $property->user_id      = $user_id;
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
    }
}
