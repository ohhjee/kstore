<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */


    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id
        ]);
    }

    public function rules(): array
    {
        return [
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'user_id' => 'exists:users,id',
            'tel_1' => 'string',
            'tel_2' => 'nullable|string',
            'region' => 'required|string',
            'city' => 'required|string'
        ];
    }
}
