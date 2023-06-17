<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserNewController extends Controller
{
    public function home()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('user.home', ['books' => $books]);
    }

    public function bookCategories(string $kategori)
    {
        $books = Book::where('kategori', $kategori)->get();
        $count = Book::where('kategori', $kategori)->count();
        return view('user.bookCategories', [
            'books' => $books,
            'count' => $count
        ]);
    }

    public function bookDetail(int $id)
    {
        $book = Book::find($id);
        return view('user.bookDetail', ['book' => $book]);
    }
}
