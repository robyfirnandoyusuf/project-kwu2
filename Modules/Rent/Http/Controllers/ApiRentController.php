<?php

namespace Modules\Rent\Http\Controllers;

use App\Models\RefStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rent\Http\Requests\RentRequest;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Rent;

class ApiRentController extends Controller
{
    use APITrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('rent::index');
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
            $user = JWTAuth::user();
            $rent = new Rent;
            $rent->property_id = $request->property_id;
            $rent->user_id = $user->id;
            $rent->active_status = RefStatus::status(RefStatus::PENDING)->ref;
            $rent->save();
        } catch (\Exception $e) {
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->success = false;
            $this->data = $e->getMessage();
        }

        $this->code = \Illuminate\Http\Response::HTTP_OK;
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
        $userId = $request->user_id;
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
            Rent::where(['user_id' => $userId, 'property_id', $propertyId])->update([
                'active_status' => $ref
            ]);
        } catch (\Exception $e) {
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->success = false;
            $this->data = $e->getMessage();
        }

        $this->code = \Illuminate\Http\Response::HTTP_OK;
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
