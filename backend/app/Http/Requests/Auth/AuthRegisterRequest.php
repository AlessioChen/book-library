<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'password_confirm' => 'required|string|same:password',
            'name' => 'required|string',

        ];
    }
}
