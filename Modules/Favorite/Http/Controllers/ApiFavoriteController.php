<?php

namespace Modules\Favorite\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\APITrait;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $favorite = Favorite::with(['property', 'user'])->where('user_id', Auth::id())->paginate($this->limit);
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
        $validate = $this->validateFavorite($request);
        if (!empty($validate))
            return $validate;

        $propId = $request->property_id;
        
        try {
            $favorite = new Favorite;
            $favorite->property_id = $propId;
            $favorite->user_id = Auth::id();
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
    public function destroy(Property $property)
    {
        try {
            $this->status = true;
            $this->code = \Illuminate\Http\Response::HTTP_OK;
            Favorite::where(['property_id' => $property->id, 'user_id' => \Auth::id()])->delete();
            // $favorite->delete();
        } catch (\Exception $e) {
            $this->status = false;
            $this->code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->json();
    }

    /* solution request class conflict ?! */
    private function validateFavorite(Request $request) {
        $uri = $request->route()->uri;
        switch (true) {
            case str_contains($uri, "/favorite/store"):
                $rules = [
                    'property_id' => [
                        'required',
                        Rule::exists('properties', 'id'),
                        Rule::unique('favorites')->where(function ($query) use($request) {
                            return $query->where('property_id', $request->property_id)
                                ->where('user_id', Auth::id());
                        }),
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
