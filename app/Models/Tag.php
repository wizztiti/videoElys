<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }

    public function videos() {
        return $this->belongsToMany('App\Models\Video');
    }
}
