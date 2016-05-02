<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikedSongs extends Model
{
    public $timestamps = false;
    protected $fillable = ['song_id', 'name'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
