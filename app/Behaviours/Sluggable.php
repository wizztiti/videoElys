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
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = empty($slug) ? str_slug($this->getAttribute($this->sluggable)) : $slug;
    }
}
