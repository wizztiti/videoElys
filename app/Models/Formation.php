<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Behaviours\Sluggable;
use App\Behaviours\Taggable;

class Formation extends Model
{
    use Sluggable;
    use Taggable;

    protected $fillable = ['title', 'resume', 'category_id', 'slug'];
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
