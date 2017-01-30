<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

$fillable = ['body', 'parent_id'];

class Comment extends Model
{

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Comment::class, 'parent_id');
    }

    public function comment(){
    	return $this->belongsTo(Comment::class, 'parent_id');
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
