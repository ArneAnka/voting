<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVoteRequest;

class GameVoteController extends Controller
{

    public function create(CreateVoteRequest $request, Game $game){
        $this->authorize('vote', $game);

        $game->voteFromUser($request->user())->delete();

        $game->votes()->create([
            'type' => $request->type,
            'user_id' => $request->user()->id
            ]);

        return response()->json(null, 200);
    }

    public function remove(Request $request, Game $game){
        $this->authorize('vote', $game);

        $game->voteFromUser($request->user())->delete();

        return response()->json(null, 200);
    }

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
