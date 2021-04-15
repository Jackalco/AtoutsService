<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Provider;

class CommentController extends Controller
{
    public function index($id) {
        $comments = Comment::where('provider_id', $id);
    }

    public function store(Request $request, $provider_id, $user_id) {
        $this->validate($request, [
            'content' => 'required',
            'opinion' => 'required'
        ]);

        Comment::create($request->only('content', 'opinion') + ['provider_id' => $provider_id] + ['user_id' => $user_id]);

        $negativeComments = Comment::where('provider_id', $provider_id)->where('opinion', 'negative')->get();

        if(count($negativeComments) % 10 == 0 && count($negativeComments) != 0) {
            $provider = Provider::find($provider_id);
            \Mail::send('mail/warning_admin', array(
                'provider' => $provider,
                'numberComments' => count($negativeComments)
            ), function($message) use ($provider){
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to('vincent.jacques1311@gmail.com', 'Administrateur')->subject('Alerte prestataire '.$provider->name);
            });
        }

        return back()->with('successComment', 'Votre commentaire a bien été ajouté !');
    }
}
