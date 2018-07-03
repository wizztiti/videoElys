<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ModelCategoryTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * ...
     *
     * @return void
     */
    public function nombre_de_categories()
    {
        $categorie1 = Category::create(['name' => 'catégorie 1', 'slug' => 'categorie-1']);
        $categorie2 = Category::create(['name' => 'catégorie 2', 'slug' => 'categorie-2']);
        $categorie3 = Category::create(['name' => 'catégorie 3', 'slug' => 'categorie-3']);

        $this->assertEquals(3, Category::count());
        $this->assertEquals('catégorie 2', $categorie2->name);

        // SUPPRESSION D'UNE CATEGORIE NON UTILISEE
        $this->assertTrue($categorie1->delete());
    }

    /**
     * @test
     */
    public function liaison_posts_categories() {
        $categorie1 = Category::create(['name' => 'catégorie 1', 'slug' => 'categorie-1']);
        $categorie2 = Category::create(['name' => 'catégorie 2', 'slug' => 'categorie-2']);

        $post = Post::create([
            'title' => 'un titre',
            'text' => 'encore du texte article bidon',
            'category_id' => $categorie2->id
        ]);

        $this->assertEquals(1, Post::count());
        $this->assertEquals(2, Category::count());
        $this->assertEquals('un titre', $post->title);
        $this->assertEquals('catégorie 2', $post->category->name);


        // SUPPRESSION D'UNE CATEGORIE UTILISEE
        $categorie1->delete();
        $this->assertEquals(1 , Category::count());


        // Test Liaison category->posts
        Post::create([
            'title' => 'un titre',
            'text' => 'encore du texte article bidon',
            'category_id' => $categorie2->id
        ]);
        Post::create([
            'title' => 'un titre',
            'text' => 'encore du texte article bidon',
            'category_id' => $categorie2->id
        ]);
        $this->assertEquals(3, $categorie2->posts()->count());
        $this->assertEquals(0, $categorie1->posts()->count());
    }

}
