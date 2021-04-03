<?php

namespace App\Traits;

trait APITrait
{

    public $success = true;
    public $data = null;
    public $message = null;
    public $code = \Illuminate\Http\Response::HTTP_OK;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function json() : \Illuminate\Http\JsonResponse
    {
        $result = array();
        $result['success'] = $this->success;
        $result['data'] = $this->data;
        $result['code'] = $this->code;
        $result['message'] = $this->message;

        return response()->json($result, $this->code, [], JSON_PRETTY_PRINT);
    }
}