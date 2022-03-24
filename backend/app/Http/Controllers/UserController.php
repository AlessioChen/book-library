<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function library(Request $request, User $user) {

        $books = $user->library()->get();

        return  BookResource::collection($books);
    }
}
