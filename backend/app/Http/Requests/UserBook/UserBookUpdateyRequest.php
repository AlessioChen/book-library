<?php

namespace App\Http\Requests\UserBook;

use Illuminate\Foundation\Http\FormRequest;

class UserBookUpdateyRequest extends FormRequest {

    public function authorize() {
        return false;
    }

    public function rules() {
        return [
            //
        ];
    }
}
