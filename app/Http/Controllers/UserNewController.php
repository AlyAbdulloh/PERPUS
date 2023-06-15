<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNewController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function bookCategories(string $kategori)
    {
        return view('user.bookCategories');
    }
}
