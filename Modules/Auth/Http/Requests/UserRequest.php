<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
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
            case str_contains($uri, "/auth/update"):
                if (!$this->has('password')) {
                    $rules = [
                        'name' => [
                            'required'
                        ],
                        'email' => [
                            'sometimes', 
                            'required', 
                            'unique:users,email,' . $user->id
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
                        'address' => [
                            'required'
                        ],
                    ];
                } else {
                    $rules = [
                        'password' => 'required|confirmed|min:5',
                    ];
                }

                if (!empty($this->avatar)) {
                    $rules['avatar'] = [
                        'sometimes',
                        'image',
                        'mimes:jpeg,png,jpg',
                        'max:5000'
                    ];
                }
                break;
            case str_contains($uri, "/user/post-user"):
                if (empty($this->has('password'))) {
                    $rules = [
                        'name' => [
                            'required'
                        ],
                        'email' => [
                            'sometimes', 
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
                } else {
                    $rules = [
                        'password' => 'required|confirmed|min:5',
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
