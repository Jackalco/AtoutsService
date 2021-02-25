<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home() {
        return view('home');
    }

    public function member_area() {
        return view('member_area')->withUser(Auth::user());
    }
}
