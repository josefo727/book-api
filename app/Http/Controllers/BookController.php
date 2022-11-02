<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * @return Collection
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * @param Request $request
     * @return Book
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $book = new Book();
        $book->title = $request->title;
        $book->save();

        return $book;
    }

    /**
     * @param Book $book
     * @return Book
     */
    public function show(Book $book)
    {
        return $book;
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return Book
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required']
        ]);

        $book->title = $request->title;
        $book->save();

        return $book;
    }

    /**
     * @param Book $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}
