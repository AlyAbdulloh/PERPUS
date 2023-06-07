<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNewController extends Controller
{
    public function showUser()
    {
        return view('admin.user');
    }
}
