<?php

namespace App\Http\Requests\UserBook;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserBookStoreRequest extends FormRequest {

    public function authorize() {
        return Auth::check();
    }

    public function rules() {
        return [
            'completed_readings' => 'required|integer',
            'book_id' => [
                'required',
                'integer',
            ]
        ];
    }
}
