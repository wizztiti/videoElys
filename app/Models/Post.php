<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use App\Behaviours\Taggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use Taggable;

    protected $fillable = ['title', 'text', 'category_id', 'slug'];
    protected $sluggable = 'title';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }
}
