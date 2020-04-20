<?php

namespace App\Http\Requests;

use App\Traits\ApiFailResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email'         => 'required|email|exists:users,email|max:255',
            'password'      => 'required|string|max:60'
        ];
    }
}
