<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
                    'email' => [
                        'required', 
                        'unique:users,email,' . $this->input('email')
                    ],
                    'username' => [
                        'required',
                        'unique:users,username,' . $this->input('username')
                    ],
                    'phone' => [
                        'required'
                    ],
                    'type' => [
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
                    'username' => [
                        'sometimes',
                        'required', 
                        'unique:users,username,' . $this->user->id
                    ],
                    'phone' => [
                        'required'
                    ],
                    'type' => [
                        'required'
                    ],
                    'address' => [
                        'required'
                    ],
                ];
                break;
        }

        return $rules;
    }
}
