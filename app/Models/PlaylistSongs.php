<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistSongs extends Model
{
    protected $fillable = ['song_id', 'name'];
    public $timestamps = false;

    public function playlist()
    {
    	return $this->belongsTo('App\Models\Playlist');
    }

}
