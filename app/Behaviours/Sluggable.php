<?php

/**
 * Created by PhpStorm.
 * User: wizztiti
 * Date: 03/07/2018
 * Time: 10:59
 */

namespace App\Behaviours;

trait Sluggable
{
    public function setSlugAttribute($slug) {
        if(empty($slug)){
            $this->attributes['slug'] = str_slug($this->name);
        } else {
            $this->attributes['slug'] = $slug;
        }
    }
}