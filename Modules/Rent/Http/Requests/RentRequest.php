<?php

namespace Modules\Rent\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $uri = $this->route()->uri;
        switch (true) {
            case str_contains($uri, "/rent/store"):
                $rules = [
                    'property_id' => [
                        'required',
                        // Rule::exists('properties', 'id')
                    ],
                ];
                break;
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
