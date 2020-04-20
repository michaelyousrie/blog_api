<?php

namespace App\Traits;

use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiFailResponseTrait
{
    protected function failedValidation(Validator $validator)
    {
        $errors = array();

        foreach ($validator->errors()->all([':key', ':message']) as $field_errors) {
            $errors[$field_errors[0]] = $field_errors[1];
        }

        throw new HttpResponseException(
            Response::failure(
                $errors
            )
        );
    }
}
