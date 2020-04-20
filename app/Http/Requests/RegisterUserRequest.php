<?php

namespace App\Http\Requests;

use App\Traits\ApiFailResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    use ApiFailResponseTrait;

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
        return [
            'name'      => 'required|string|min:3|max:30',
            'username'  => 'required|string|min:3|max:30|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:5|max:30'
        ];
    }
}
