<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'email is required',
        ];
    }
    public function credentials()
    {
        // if (filter_var($this->get('usernameOrEmail'), FILTER_VALIDATE_EMAIL)) {
        $Email = [
            'email' => $this->get('email')
        ];
        // } else {
        // $usernameOrEmail = [
        //     'username' => $this->get('usernameOrEmail')
        // ];
        // }

        return array_merge($Email, ['password' => $this->get('password')]);
    }
}
