<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999999999'],
            'amount' => ['required', 'numeric', 'min:0', 'max:9999999999'],
            'banner' => ['required', 'file'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
