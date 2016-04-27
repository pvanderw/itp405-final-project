<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
	protected $fillable = ['name'];
	public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function playlistsongs()
    {
    	return $this->hasMany('App\Models\PlaylistSongs');
    }
}
