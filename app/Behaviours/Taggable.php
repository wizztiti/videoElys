<?php
/**
 * Created by PhpStorm.
 * User: wizztiti
 * Date: 19/07/2018
 * Time: 19:22
 */

namespace App\Behaviours;

use App\Models\Tag;
use App\Observer\TaggableObserver;
use Illuminate\Support\Str;

trait Taggable
{
    public static function bootTaggable() {
        static::observe(TaggableObserver::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function saveTags(string $tags = null) {
        // récupère la liste des tags à associer à l'article
        $tags = array_filter(array_unique(array_map(function ($item) {
            return trim($item);
        }, explode(',', $tags))), function ($item) {
            return !empty($item);
        });

        // récupère les tags qui sont déjà en base de données
        $persisted_tags = Tag::whereIn('name', $tags)->get();

        // trouve les nouveaux tags, et les insère en base
        $tags_to_create = array_diff($tags, $persisted_tags->pluck('name')->all());
        $tags_to_create = array_map(function ($tag) {
            return [
                'name' => $tag,
                'slug' => Str::slug($tag)
            ];
        }, $tags_to_create);
        $created_tags = [];
        foreach ($tags_to_create as $value) {
            $tag = Tag::create([
                'name' => $value['name'],
                'slug' => $value['slug']
            ]);
            $created_tags[] = $tag;
        }
        $persisted_tags = $persisted_tags->merge($created_tags);

        // création des relations
        $edits = $this->tags()->sync($persisted_tags);

        // MAJ du compteur de posts pour chaque tag
        Tag::whereIn('id', $edits['attached'])->increment('post_count', 1);
        Tag::whereIn('id', $edits['detached'])->decrement('post_count', 1);

        // suprime les tags n'ayant aucune relation
        Tag::removeUnused();
    }

    /**
     *
     */
    public function getTagsListAttribute() {
        return $this->tags->pluck('name')->implode(',');
    }
}