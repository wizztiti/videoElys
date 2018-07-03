<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    use Sluggable;
}
