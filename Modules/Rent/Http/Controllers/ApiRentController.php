<?php

namespace Modules\Rent\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Modules\Rent\Http\Requests\RentRequest;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Http\Response;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use App\Models\Rent;
use App\Models\Payment;
use App\Models\Property;
use App\Models\RefRole;
use App\Models\RefStatus;

class ApiRentController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function userRent(Request $request)
    {
        // $type = Auth::user()->role;
        $rent = Rent::with(['property.gallery', 'payment.refStatus'])->where('user_id', Auth::id())->get();

        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = $rent;
        
        return $this->json();
    }

    public function mitraRent(Request $request)
    {
        $rent = Rent::with(['property.gallery', 'payment.refStatus', 'user'])->whereHas('property', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();

        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = $rent;
        
        return $this->json();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     * note : harus perbaiki dulu module property untuk menggunakan rentrequest ?! err missing Fac model
     */
    public function store(Property $property, Request $request)
    {
        $validate = $this->validateRent($request);
        if (!empty($validate)) {
            return $validate;
        }
        
        $user = Auth::user();
        // $responseMidtrans = [];
        $totalRent = Rent::where('property_id', $property->id)->where('active_status', '!=', 13)->count();
        if ($totalRent >= $property->room_total) {
            $this->code = Response::HTTP_UNPROCESSABLE_ENTITY;
            $this->success = false;
            $this->message = 'Kamar penuh !';
            return $this->json();
        }
        
        DB::beginTransaction();
        try {

            $payment = new Payment;
            $payment->code = "P".date("ymdHis").$property->id.$user->id;
            $payment->amount = $property->basic_price;

            // Dynamic
            $payment->admin_cost = $property->basic_price * 10/100;
            $payment->name = "Sewa Kos ". $property->title;
            $payment->status_payment = RefStatus::STATUS_WAITING;
            
            // Call Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $payment->code,
                    'gross_amount' => $property->basic_price + $payment->admin_cost,
                ],
                "item_details" => [
                    [
                      "id" => "a01",
                      "price" => $property->basic_price,
                      "quantity" => 1,
                      "name" => $payment->name
                    ],
                    [
                      "id" => "b02",
                      "price" => $payment->admin_cost,
                      "quantity" => 1,
                      "name" => "Biaya Admin"
                    ]
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'last_name' => '',
                    'email' => $user->email,
                    'phone' => $user->phone,
                ]
            ];
            $responseMidtrans = $this->getMidtrans($params);
            $payment->snap_token = $responseMidtrans->token;
            $payment->save();

            $rent = new Rent;
            $rent->property_id = $property->id;
            $rent->user_id = $user->id;
            $rent->payment_id = $payment->id;
            $rent->active_status = RefStatus::STATUS_NON_ACTIVE;
            $rent->enter_date = $request->enter_date;
            $rent->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->success = false;
            $this->data = $e->getMessage();
            return $this->json();
        }

        $this->code = Response::HTTP_OK;
        $this->success = true;
        $this->data = [
            "payment_code" => $payment->code,
            "payment_link" => $responseMidtrans->redirect_url,
            "payment_id" => $responseMidtrans->token,
        ];

        return $this->json();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('rent::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('rent::edit');
    }

    /**
     * Update accept / deny for mitra
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $validate = $this->validateRent($request);
        if (!empty($validate))
            return $validate;

        $rentId = $request->rent_id;
        $status = $request->status; // accepted / delete
        $ref = "";
        switch ($status) {
            case 'accept':
                $ref = RefStatus::STATUS_ACCEPT;
                break;
            default:
                $ref = RefStatus::STATUS_DELETE;
                break;
        }

        try {
            Rent::where(['id' => $rentId])->update([
                'active_status' => $ref
            ]);
        } catch (\Exception $e) {
            $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->success = false;
            $this->data = $e->getMessage();
        }

        $this->code = Response::HTTP_OK;
        $this->success = true;
        return $this->json();
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

    /* solution request class conflict ?! */
    private function validateRent(Request $request) {
        $uri = $request->route()->uri;
        switch (true) {
            case str_contains($uri, "/rent/store"):
                $rules = [
                    // 'property_id' => [
                    //     'required',
                    //     Rule::exists('properties', 'id'),
                    //     Rule::unique('rents')->where(function ($query) use($request) {
                    //         return $query->where('property_id', $request->property_id)
                    //             ->where('user_id', Auth::id());
                    //     }),
                    // ],
                    'enter_date' => [
                        'required',
                        'date_format:Y-m-d'
                    ],
                ];
                break;
            case str_contains($uri, "/rent/update"):
                $rules = [
                    'rent_id' => [
                        'required',
                    ],
                    'status' => [
                        'required',
                        Rule::in(['accept', 'delete'])
                    ],
                ];
                break;
        }

        $validatorMessage = [];

        $validator = Validator::make($request->all(), $rules, $validatorMessage);
        $errorString = implode(", ",$validator->messages()->all());

        if ($validator->fails()) {
            $this->success = false;
            $this->data = $validator->errors();
            $this->code = Response::HTTP_BAD_REQUEST;
            $this->message = $errorString;
            return $this->json();
        }
    }
}
