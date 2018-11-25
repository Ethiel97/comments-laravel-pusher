<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\CommentEvent;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function index()
    {
        return view('comments');
    }

    public function fetchComments()
    {

        $comments = Comment::all();

        return $comments->toJson();
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        event(new CommentEvent($comment));
        return response()->json('ok');

    }
}
