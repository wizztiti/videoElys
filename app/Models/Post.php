<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text'];

    public function categorie() {
        return $this->hasOne('App\Models\Category');
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'tags_posts');
    }
}
