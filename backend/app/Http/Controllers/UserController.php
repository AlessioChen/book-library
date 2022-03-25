<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserAddBookToLibraryRequest;
use App\Http\Requests\User\UserBooksNotInLibrarysRequest;
use App\Http\Requests\User\UserLibraryBooksRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller {

    public function libraryBooks(UserLibraryBooksRequest $request, User $user) {

        $books = $user->library()->get();

        return  BookResource::collection($books);
    }

    public function booskNotInLibrary(UserBooksNotInLibrarysRequest $request, User $user) {

        $books = Book::all()
            ->except($user
                ->library()
                ->get()
                ->pluck('id')
                ->toArray());


        return BookResource::collection($books);
    }

    public function addBookToLibrary(UserAddBookToLibraryRequest $request, User $user) {

        $user->library()->attach($request->validated('book_id'), [
            'add_date' => Carbon::now(),
            'completed_readings' => $request->validated('completed_readings'),
        ]);

        return response()->json('Book added to your library!');
    }
}
