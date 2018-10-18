<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Behaviours\Sluggable;

class Chapter extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'num',  'text', 'formation_id', 'slug'];
    protected $sluggable = 'title';

    public function formation() {
        return $this->belongsTo(Formation::class);
    }
}
