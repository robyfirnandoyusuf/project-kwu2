<?php

namespace Modules\Rent\Http\Controllers;

use App\Models\RefStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rent\Http\Requests\RentRequest;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Http\Response;
use Auth;
use Carbon\Carbon;

use App\Models\Rent;

class ApiRentController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $type = $request->type;
        $rent = Rent::with(['property']);

        switch ($type) {
            case 'mitra': //get list rent by mitra
                $rent = $rent->whereHas('property', function ($q) {
                    $q->where('user_id', Auth::id());
                })->get();
                break;
            
            default://get list rent by user
                $rent = $rent->with(['property'])->where('user_id', Auth::id())->get();
                break;
        }

        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = $rent;
        
        return $this->json();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('rent::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     * note : harus perbaiki dulu module property untuk menggunakan rentrequest ?! err missing Fac model
     */
    public function store(Request $request)
    {
        try {
            $rent = new Rent;
            $rent->property_id = $request->property_id;
            $rent->user_id = Auth::id();
            $rent->active_status = RefStatus::status(RefStatus::PENDING)->ref;
            $rent->enter_date = Carbon::createFromFormat('d/m/Y', $request->enter_date)->toDateTimeString();
            $rent->save();
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
        $propertyId = $request->property_id;
        $status = $request->status; // accepted / deny
        $ref = "";
        switch ($status) {
            case 'accept':
                $ref = RefStatus::status(RefStatus::ACCEPT)->ref;
                break;
            default:
                $ref = RefStatus::status(RefStatus::PENDING)->ref;
                break;
        }

        try {
            Rent::where(['user_id' => Auth::id(), 'property_id' => $propertyId])->update([
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
}
