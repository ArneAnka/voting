<?php

namespace App;

use App\Traits\CommentableTrait;

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


}
