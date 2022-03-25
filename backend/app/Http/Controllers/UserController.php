<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserAddBookToLibraryRequest;
use App\Http\Requests\User\UserBooksNotInLibrarysRequest;
use App\Http\Requests\User\UserDeleteBookFromLibrary;
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

        return response()->json(["message" => 'Book added to your library!']);
    }

    public function deleteBookFromLibrary(UserDeleteBookFromLibrary $request, User $user, Book $book) {

        if (!$user->library()->where('book_id', $book->id)->exists()) {
            return response()->json(["error" => 'Book Not present in library'], 404);
        }

        $user->library()->detach($book);

        return response()->json(["message" => "Book delete from library"]);
    }
}
