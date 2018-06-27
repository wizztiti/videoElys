<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Author extends User
{
    public function posts() {

        return $this->hasMany('App\Models\Post');
    }
}
