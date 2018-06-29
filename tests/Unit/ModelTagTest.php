<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function nombre_de_Tags()
    {
        $tag1 = Tag::create(['name' => 'tag 1']);
        $tag2 = Tag::create(['name' => 'tag 2']);
        $tag3 = Tag::create(['name' => 'tag 3']);

        $this->assertEquals(3, Tag::count());
        $tag2->delete();
        $this->assertEquals(2, Tag::count());
    }

    /**
     * @test
     */
    public function test_liaison_tags_posts()
    {
        $tag1 = Tag::create(['name' => 'tag 1']);
        $tag2 = Tag::create(['name' => 'tag 2']);
        $tag3 = Tag::create(['name' => 'tag 3']);

        $categorie1 = Category::create(['name' => 'catégorie 1']);
        $categorie2 = Category::create(['name' => 'catégorie 2']);

        $post1 = Post::create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'category_id' => $categorie1->id,
        ]);
        $post2 = Post::create([
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'category_id' => $categorie1->id,
        ]);
        $post3 = Post::create([
            'title' => 'titre de l\'article numéro 3',
            'text' => 'un text tres long de l\'article numéro 3',
            'category_id' => $categorie2->id,
        ]);

        $this->assertEquals(0, $post1->tags->count());          // test que le nbr de tags est bien 0

        $post1->tags()->sync([$tag1->id, $tag2->id]);           // ajoute 2 tags à l'article
        $this->assertEquals(2, $post1->tags()->count());        // test que le nbr de tags est bien 2

        $tag_a_suppr = $post1->tags()->where('name', 'tag 2')->first()->id;
        $post1->tags()->detach($tag_a_suppr);                   // Supprime 1 tag de l'article
        $this->assertEquals(1, $post1->tags()->count());        // test que le nbr de tags est bien 1
        $this->assertEquals('tag 1' , $post1->tags()->first()->name);
    }
}
