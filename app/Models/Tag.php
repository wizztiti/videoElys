<?php

namespace App\Models;

use App\Behaviours\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];
    protected $sluggable = 'name';
    public $timestamps = false;

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function videos() {
        return $this->belongsToMany(Video::class);
    }

    public static function removeUnused() {
        return static::where('post_count', 0)->delete();
    }
}
