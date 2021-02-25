<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Visitors
     *
     * @return \Illuminate\View\View
     */
    public function visitor()
    {
        return view('visitor');
    }

    /**
     * User Home
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }
}