<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function show() {
        return view('provider/provider');
    }

    public function showForm() {
        return view('provider/form_provider');
    }

    public function applyForm(Request $request) {

    }
}
