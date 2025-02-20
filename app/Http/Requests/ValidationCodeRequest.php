<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'validation_code' => 'required|numeric|digits:6'
        ];
    }

    public function messages(): array
    {
        return [
            'validation_code.numeric' => 'O código de verificação deve conter apenas números',
            'validation_code.digits'  => 'Número minimo de caracteres não atendidos',
        ];
    }
}
