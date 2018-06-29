<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'duration', 'teaser_file', 'video_file'];

    public function tags() {
        return $this->belongsToMany('App\Models\Tag',);
    }

    public function users() {
        return $this->belongsToMany('App\User' , 'videos_users');
    }
}
