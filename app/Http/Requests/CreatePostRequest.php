<?php

namespace App\Http\Requests;

use App\Traits\ApiFailResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'     => 'required|string|min:6|max:150',
            'body'      => 'required|string|min:50|max:1000',
        ];
    }
}
