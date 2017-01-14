<?php

namespace App;

use App\Traits\CommentableTrait;

use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	use CommentableTrait;

	public function getRouteKeyName(){
	    return 'slug';
	}

	public function scopeSerach($query, $search){
		return $query->where('title', 'LIKE', "%$search%");
	}

	public function scopeConsole($query, $search){
		return $query->where('console', $search);
	}

	public function votes(){
		return $this->morphMany(Vote::class, 'voteable');
	}

	public function votesAllowed(){
		// return (bool) $this->allow_votes;
		return (bool) true;
	}

	public function upVotes(){
		return $this->votes->where('type', 'up');
	}

	public function downVotes(){
		return $this->votes->where('type', 'down');
	}

	public function voteFromUser(User $user){
		return $this->votes()->where('user_id', $user->id);
	}

}
