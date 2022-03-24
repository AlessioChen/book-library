<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AuthLogoutRequest extends FormRequest {

    public function authorize() {
        return Auth::check();
    }


    public function rules() {
        return [
            //
        ];
    }
}
