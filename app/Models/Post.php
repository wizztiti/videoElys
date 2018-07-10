<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'slug'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = empty($slug) ? str_slug($this->title) : $slug;
    }
}
