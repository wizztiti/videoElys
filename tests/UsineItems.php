<?php

namespace Tests;

use App\Models\Category;
use App\Models\Formation;
use App\Models\Chapter;
use App\Models\Tag;

class UsineItems
{
    protected $categoriesIDs;

    public function makeItems ($nbrCategories, $nbrFormations, $nbrChapter, $nbrTags = null) {

        // DEFINI LE NOMBRE DE CATEGORIES & FORMATION POUR CETTE SERIE DE TEST
        $nbr_categories = $nbrCategories;
        $nbr_formations = $nbrFormations;
        $nbr_chapters = $nbrChapter;
        $nbr_tags = $nbrTags;

        // Création des categories
        for($i = 1; $i <= $nbr_categories; $i++) {
            factory(Category::class)->create(['name' => 'category-' . $i]);
        }
        Category::each(function($item, $key){
            array_push($this->categoriesIDs, $item->id);
        });

        // Création des formations
        for($i = 1; $i <= $nbr_formations; $i++) {
            $categoryIDRandom = $this->categoriesIDs[array_rand($this->categoriesIDs)];
            factory(Formation::class)->create(['category_id' => Category::where('id', '=', $categoryIDRandom)->first()]);
        }

        // Création des chapitres de formation
        for($i = 1; $i <= $nbr_chapters; $i++) {
            factory(Chapter::class)->create(['num' => $i]);
        }

        //Création des tags
        for($i = 1; $i <= $nbr_tags; $i++) {
            factory(Tag::class)->create();
        }
    }
}
