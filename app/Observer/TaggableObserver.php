<?php
/**
 * Created by PhpStorm.
 * User: wizztiti
 * Date: 19/07/2018
 * Time: 20:12
 */

namespace App\Observer;

use App\Models\Post;
use App\Models\Tag;

class TaggableObserver
{
    public function deleting(Post $post) {
        $tags_id = $post->tags->pluck('id');
        Tag::whereIn('id', $tags_id)->decrement('post_count', 1);
        Tag::removeUnused();
    }
}