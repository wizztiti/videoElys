<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];
    protected $sluggable = 'name';

    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }

    public function videos() {
        return $this->belongsToMany('App\Models\Video');
    }
}
