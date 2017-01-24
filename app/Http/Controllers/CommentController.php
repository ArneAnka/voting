<?php

namespace App\Http\Controllers;

use App\Game;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Game $game){
    	return view('m.comments.index', compact('game'));
    }

    public function store(Request $request, Game $game, Comment $comment){
	    $this->validate($request, [
	        'body' => 'required',
	    ]);

	    $reply = new Comment;
	    $reply->body = $request->body;
	    $reply->user()->associate($request->user());
	    $reply->parent_id = $comment->id;

	    $game->comments()->save($reply);

    	return back();
    }

    public function topLevel(Request $request, Game $game){
	    $this->validate($request, [
	        'body' => 'required',
	    ]);

	    $reply = new Comment;
	    $reply->body = $request->body;
	    $reply->user()->associate($request->user());

	    $game->comments()->save($reply);

    	return back();
    }
}
