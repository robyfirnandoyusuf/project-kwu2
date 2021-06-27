<?php

namespace Modules\Auth\Http\Requests;

use App\Models\RefRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            case str_contains($uri, "register/post-register"):
                $rules = [
                    'name' => ['required'],
                    'address' => ['required'],
                    'email' => [
                        'required',
                        'unique:users,email,'.$this->input('email')
                    ],
                    'role' => [
                        'required',
                        Rule::in([
                            RefRole::REF_MITRA,
                            RefRole::REF_USER
                        ])
                    ],
                    'gender' => [
                        'required',
                        Rule::in([1, 2])
                    ],
                    'password' => ['required'],
                    'phone' => ['required'],
                    'image' => ['mimes:jpeg,jpg,png,gif,jfif|max:10000'],
                    'identity' => ['required']
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
