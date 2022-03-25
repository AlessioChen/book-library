<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserLibraryBooksRequest extends FormRequest {

    public function authorize() {
        return Auth::check();
    }


    public function rules() {
        return [
            //
        ];
    }
}
