<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function legal_mention() {
        return view('legal_mention');
    }

    public function privacy_policy() {
        return view('privacy_policy');
    }

}
