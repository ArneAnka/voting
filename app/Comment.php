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
}
