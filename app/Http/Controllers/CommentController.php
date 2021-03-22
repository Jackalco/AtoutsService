<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($id) {
        $comments = Comment::where('provider_id', $id);
    }

    public function store(Request $request, $user_id, $provider_id) {
        $this->validate($request, [
            'content' => 'required',
            'opinion' => 'required'
        ]);

        Comment::create($request->only('content', 'opinion') + ['provider_id' => $provider_id] + ['user_id' => $user_id]);

        return back()->with('successComment')
    }
}
