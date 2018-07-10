<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = empty($slug) ? str_slug($this->name) : $slug;
    }
}
