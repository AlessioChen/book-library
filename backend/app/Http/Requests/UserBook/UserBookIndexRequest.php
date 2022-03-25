<?php

namespace App\Http\Requests\UserBook;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserBookIndexRequest extends FormRequest {

    public function authorize() {
        return Auth::check();
    }

    public function rules() {
        return [
            //
        ];
    }
}
