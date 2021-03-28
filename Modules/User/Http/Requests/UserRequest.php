<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            case str_contains($uri, "/user/store"):
                $rules = [
                    'name' => [
                        'required'
                    ],
                    'password' => [
                        'required'
                    ],
                    'email' => [
                        'required', 
                        'unique:users,email,' . $this->input('email')
                    ],
                    'gender' => [
                        'required'
                    ],
                    'phone' => [
                        'required'
                    ],
                    'identity' => [
                        'required'
                    ],
                    'avatar' => [
                        'sometimes',
                        'image',
                        'mimes:jpeg,png,jpg',
                        'max:5000'
                    ],
                    'active_status' => [
                        'required'
                    ],
                    'address' => [
                        'required'
                    ],
                ];
                break;
            case str_contains($uri, "/user/update"):
                $rules = [
                    'name' => [
                        'required'
                    ],
                    'email' => [
                        'sometimes', 
                        'required', 
                        'unique:users,email,' . $this->user->id
                    ],
                    'gender' => [
                        'required'
                    ],
                    'phone' => [
                        'required'
                    ],
                    'identity' => [
                        'required'
                    ],
                    'active_status' => [
                        'required'
                    ],
                    'address' => [
                        'required'
                    ],
                ];

                if (!empty($this->avatar)) {
                    $rules['avatar'] = [
                        'sometimes',
                        'image',
                        'mimes:jpeg,png,jpg',
                        'max:5000'
                    ];
                }
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
