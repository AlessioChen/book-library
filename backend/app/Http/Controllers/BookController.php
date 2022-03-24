<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookIndexRequest;
use App\Http\Requests\Book\BookShowRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function index(BookIndexRequest $request) {

        return BookResource::collection(Book::all());

    }


    public function store(Request $request) {
        //
    }


    public function show(BookShowRequest $request, Book $book) {

        return new BookResource($book);
    }


    public function update(Request $request, $id) {
        //
    }


    public function destroy($id) {
        //
    }
}
