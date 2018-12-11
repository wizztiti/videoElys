<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

use App\Behaviours\Sluggable;
use App\Behaviours\Taggable;
use App\Http\Requests\FormationRequest;

class Formation extends Model
{
    use Sluggable;
    use Taggable;

    protected $fillable = [
        'title',
        'resume',
        'category_id',
        'slug',
        'teaser_path',
        'price',
    ];

    protected $sluggable = 'title';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function author() {
        return $this->hasOne('App\Models\Author');
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

}
