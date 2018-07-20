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
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function saveTags($tags) {
        $tags = array_map(function($item) {
            return trim($item);
        }, explode(',', $tags));
        $tags = array_unique($tags);
        $tags = array_filter($tags, function($item){
            return !empty($item);
        });

        if(empty($tags)){
            return false;
        }
        $persisted_tags = Tag::whereIn('name', $tags)->get();
        $tags_to_create = array_diff($tags, $persisted_tags->pluck('name')->all());
        $tags_to_create = array_map(function($tag){
            return ['name' => $tag, 'slug' => str_slug($tag)];
        }, $tags_to_create);
        $created_tags = $this->tags()->createMany($tags_to_create);
        $persisted_tags = $persisted_tags->merge($created_tags);
        $this->tags()->sync($persisted_tags);
    }
}
