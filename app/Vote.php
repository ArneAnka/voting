<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['type', 'user_id'];

    public function voteable(){
    	return $this->morphTo();
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function count($voteable)
    {
        return $voteable->votes()
                        ->count();
    }

    public function countUps($voteable, $value = 'up')
    {
        return $voteable->votes()
                        ->where('type', $value)
                        ->count();
    }

    public function countDowns($voteable, $value = 'down')
    {
        return $voteable->votes()
                        ->where('type', $value)
                        ->count();
    }

    public function countByDate($voteable, $from, $to = null)
    {
        $query = $voteable->votes();
        if (!empty($to)) {
            $range = [new Carbon($from), new Carbon($to)];
        } else {
            $range = [
                (new Carbon($from))->startOfDay(),
                (new Carbon($to))->endOfDay(),
            ];
        }
        return $query->whereBetween('created_at', $range)
                     ->count();
    }

    public function up($voteable)
    {
        return (bool) $this->cast($voteable, 'up');
    }

    public function down($voteable)
    {
        return (bool) $this->cast($voteable, 'down');
    }

    public function setValueAttribute($value)
    {
        $this->attributes['type'] = ($value == 'down') ? 'down' : 'up';
    }

    protected function cast($voteable, $value = 'up')
    {
        if (!$voteable->exists) {
            return false;
        }
        $vote = new static();
        $vote->value = $value;
        return (bool) $vote->voteable()
            ->associate($voteable)
            ->save();
    }

}
