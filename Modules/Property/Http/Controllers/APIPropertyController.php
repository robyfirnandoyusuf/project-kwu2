<?php

namespace Modules\Property\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Traits\APITrait;
use Auth;
use DB;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Media;
use Modules\Property\Transformers\PropertyResource;
use Modules\Property\Transformers\PublicPropertyResource;

class APIPropertyController extends Controller
{

    use APITrait;
    private $limit = 10;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $basicPrices = $request->basic_prices; //array
        $per_page = 10;

        if ($request->per_page) {
            $per_page = $request->per_page;
        }

        $properties = Property::where('user_id', Auth::user()->id);

        if($q != "" ) {
            $properties = $properties->whereLike(Property::$search, $q);
        }

        if (!empty($basicPrices))
            $properties = $properties->whereBetween('basic_price', $basicPrices);

        $properties = $properties->paginate($per_page);

        $this->success = true;
        $this->data = PropertyResource::collection($properties)->response()->getData(true);
        $this->status = Response::HTTP_OK;

        return $this->json();
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
            $this->code = Response::HTTP_BAD_REQUEST;
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
        if (!$this->idorChecker($property->user_id)) {
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
            $this->code = Response::HTTP_BAD_REQUEST;
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
        if (!$this->idorChecker($property->user_id)) {
            $this->success = false;
            $this->code = Response::HTTP_BAD_REQUEST;
            return $this->json(); 
        }

        $property->delete();

        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->message = "Success delete property!";
        return $this->json();
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
            'property_image_ids' => [
                'required',
                'array',
                'min:1',
                Rule::exists('media', 'id')->where(function ($query) {
                    return $query->where('type', 'property');
                }),
            ]
        ];

        $validatorMessage = [];

        $validator = Validator::make($request->all(), $validatorRule, $validatorMessage);
        $errorString = implode(", ",$validator->messages()->all());

        if ($validator->fails()) {
            $this->success = false;
            $this->data = $validator->errors();
            $this->status = Response::HTTP_BAD_REQUEST;
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
        $property->is_featured  = $request->is_featured;

        $property->save();
    }

    /**
     * =====================================================================================================
     * END HELPER FOR PROPERTY
     * =====================================================================================================
     */

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function public_index(Request $request)
    {
        $q = $request->q;
        $per_page = 10;

        if ($request->per_page) {
            $per_page = $request->per_page;
        }

        $properties = Property::with(['district', 'district.city'])
            ->where('active_status', 1)
            ->select('properties.*', \DB::raw('room_total  - (SELECT count(*) FROM rents WHERE property_id = properties.id AND active_status != 13) as sisa_kamar'));

        if ($request->city_id != 0) {
            $properties = $properties->whereHas('district.city', function($q) use ($request) {
                $q->where('id', $request->city_id);
            });
        }

        if ($request->is_featured != 0) {
            $properties = $properties->where("is_featured", $request->is_featured);
        }

        if ($request->mitra_id != 0 ) {
            $properties = $properties->where("user_id", $request->mitra_id);
        }

        if($q != "" ) {
            $properties = $properties->whereLike(Property::$search, $q);
        }

        if (!empty($request->order_by) && !empty($request->sort)) {
            $properties = $properties->orderBy($request->order_by, $request->sort);
        }
        $properties = $properties->having('sisa_kamar', '>', 0);
        // $properties = $properties->dd();
        $properties = $properties->paginate($per_page);

        $this->success = true;
        $this->data = PublicPropertyResource::collection($properties)->response()->getData(true);
        $this->status = Response::HTTP_OK;

        return $this->json();
    }

    /**
     * Show the specified resource.
     * @param Property $property
     * @return Renderable
     */
    public function public_show(Property $property)
    {
        
        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = new PropertyResource($property);

        return $this->json();
    }

    public function test_midtrans(Request $request) {

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ],
        ];

        // dd(Auth::user()->name);

        dd($this->getMidtrans($params));

        return $this->json();
    }
}
