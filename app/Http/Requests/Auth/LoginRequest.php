<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
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
        //     $usernameOrEmail = [
        //         'username' => $this->get('usernameOrEmail')
        //     ];
        // }

        return array_merge($Email, ['password' => $this->get('password')]);
    }
}
