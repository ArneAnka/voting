<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameVoteController extends Controller
{
    public function show(Request $request, Game $game){
    	$response = [
	    	'up' => null,
	    	'down' => null,
	    	'can_vote' => $game->votesAllowed(),
	    	'user_vote' => null
    	];

    	if($game->votesAllowed()){
    		$response['up'] = $game->upVotes()->count();
    		$response['down'] = $game->downVotes()->count();
    	}

    	if($request->user()){
    		$voteFromUser = $game->voteFromUser($request->user())->first();
    		$response['user_vote'] = $voteFromUser ? $voteFromUser->type : null;
    	}
    	
    	return response()->json([
    		'data' => $response
    		], 200);

    }
}
