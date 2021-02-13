<?php


namespace App\Http\Requests;


use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    public function failedValidation(Validator $validator)
    {
        $buildResponse = response()->json(
            [
                'success' => false,
                'message' => __("The given data is invalid"),
                'errors' =>  $validator->errors()
            ]
        );
        throw new ValidationException($validator, $buildResponse);
    }
}
