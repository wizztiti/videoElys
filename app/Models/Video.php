<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'duration', 'teaser_url', 'video_file'];
    protected $sluggable = 'title';

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
