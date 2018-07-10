<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelPostTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function nombre_de_Posts()
    {
        $categorie1 = Category::create(['name' => 'catégorie 1', 'slug' => 'categorie-1']);
        $categorie2 = Category::create(['name' => 'catégorie 2', 'slug' => 'categorie-2']);

        $post1 = Post::create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
            'category_id' => $categorie1->id,
        ]);
        $post2 = Post::create([
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'slug' => 'article-2',
            'category_id' => $categorie1->id,
        ]);
        $post3 = Post::create([
            'title' => 'titre de l\'article numéro 3',
            'text' => 'un text tres long de l\'article numéro 3',
            'slug' => 'article-3',
            'category_id' => $categorie2->id,
        ]);

        $this->assertEquals(3, Post::count());

    }

    /**
     * @test
     */
    public function liaison_posts_categories() {
        $categorie1 = Category::create(['name' => 'catégorie 1', 'slug' => 'categorie-1']);
        $categorie2 = Category::create(['name' => 'catégorie 2', 'slug' => 'categorie-2']);

        $post1 = Post::create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
            'category_id' => $categorie1->id,
        ]);
        $post2 = Post::create([
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'slug' => 'article-2',
            'category_id' => $categorie1->id,
        ]);
        $post3 = Post::create([
            'title' => 'titre de l\'article numéro 3',
            'text' => 'un text tres long de l\'article numéro 3',
            'slug' => 'article-3',
            'category_id' => $categorie2->id,
        ]);

        // Test Liaison category()
        $this->assertEquals('catégorie 1', $post1->category->name);
        $this->assertEquals('catégorie 1', $post2->category->name);
        $this->assertEquals('catégorie 2', $post3->category->name);

        //Test suppression d'un post
        $post1->delete();
        $this->assertEquals(2, Post::count());
    }
}
