<?php

namespace Modules\Payment\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Property;
use App\Models\RefStatus;
use App\Models\Withdraw;
use App\Traits\AjaxTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ApiPaymentController extends Controller
{
    use AjaxTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $mutasi = Mutasi::with('user')->whereUserId(Auth::id())->get();
        $this->success = true;
        $this->code = Response::HTTP_OK;
        $this->data = $mutasi;
        return $this->json();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('payment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function withdraw(Request $request)
    {
        // $propId = $request->property_id;
        $amount = $request->amount;
        // $property = Property::whereId($propId)->first();
        try {
            $wd = new Withdraw();
            $wd->user_id = \Auth::id();
            $wd->nominal = $amount;
            $wd->status = RefStatus::STATUS_WAITING;
            $wd->save();

            $this->code = \Illuminate\Http\Response::HTTP_OK;
            $this->success = true;
            $this->message = 'Berhasil !';
        } catch (\Exception $e) {
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->success = false;
            $this->message = 'Gagal !';
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
        // return view('payment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('payment::edit');
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
