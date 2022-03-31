<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBook\UserBookDestroyRequest;
use App\Http\Requests\UserBook\UserBookIndexRequest;
use App\Http\Requests\UserBook\UserBookStoreRequest;
use App\Http\Requests\UserBook\UserBookUpdatetRequest;
use App\Http\Requests\UserBookNotInRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;

class UserBookController extends Controller {

    public function index(UserBookIndexRequest $request, User $user) {

        $books = $user->library()->get();

        return  BookResource::collection($books);
    }

    public function update(UserBookUpdatetRequest $request, User $user, Book $book) {

        $user->library()->syncWithoutDetaching([
            $request->validated('book_id') => [
                'completed_readings' => $request->validated('completed_readings')
            ],
        ]);

        return response()->json(["message" => 'Book updated!']);
    }

    public function store(UserBookStoreRequest $request, User $user) {

        $book_id =  $request->validated('book_id');

        if ($user->books()->where('id', $book_id)->exists()) {
            $user->books()->detach($book_id);
        }

        $user->library()->attach($book_id, [
            'add_date' => Carbon::now(),
            'completed_readings' => $request->validated('completed_readings'),
            'deleted_at' => null
        ]);






        return response()->json(["message" => 'Book added to your library!']);
    }

    public function destroy(UserBookDestroyRequest $request, User $user, Book $book) {

        if ($user->library()->where('book_id', $book->id)->doesntExist()) {
            return response()->json(["error" => 'Book Not present in library'], 404);
        }

        $user->library()->updateExistingPivot($book->id, ['deleted_at' => Carbon::now()]);

        return response()->json(["message" => "Book delete from library"]);
    }

    public function booskNotInLibrary(UserBookNotInRequest $request, User $user) {

        $books = Book::all()
            ->except($user
                ->library()
                ->get()
                ->pluck('id')
                ->toArray());


        return BookResource::collection($books);
    }
}
