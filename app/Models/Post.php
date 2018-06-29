<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }
}
