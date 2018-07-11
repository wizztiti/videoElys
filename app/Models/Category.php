<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];
    protected $sluggable = 'name';

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    /*public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = empty($slug) ? str_slug($this->name) : $slug;
    }*/
}
