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

    protected $tag1, $tag2, $tag3;
    protected $category1, $category2;
    protected $post1, $post2;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->tag1 = Tag::create(['name' => 'tag 1', 'slug' => '']);
        $this->tag2 = Tag::create(['name' => 'tag 2', 'slug' => '']);
        $this->tag3 = Tag::create(['name' => 'tag 3', 'slug' => '']);

        $this->category1 = Category::create(['name' => 'catégorie 1', 'slug' => 'categorie-1']);
        $this->category2 = Category::create(['name' => 'catégorie 2', 'slug' => 'categorie-2']);

        $this->post1 = Post::create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
            'category_id' => $this->category1->id,
        ]);
        $this->post2 = Post::create([
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'slug' => 'article-2',
            'category_id' => $this->category1->id,
        ]);
        $this->post3 = Post::create([
            'title' => 'titre de l\'article numéro 3',
            'text' => 'un text tres long de l\'article numéro 3',
            'slug' => 'article-3',
            'category_id' => $this->category2->id,
        ]);
    }

    /**
     * @test
     */
    public function test_liaison_tags_posts()
    {

        $this->assertEquals(0, $this->post1->tags->count());          // test que le nbr de tags est bien 0

        $this->post1->tags()->sync([$this->tag1->id, $this->tag2->id]);           // ajoute 2 tags à l'article
        $this->assertEquals(2, $this->post1->tags()->count());        // test que le nbr de tags est bien 2

        $tag_a_suppr = $this->post1->tags()->where('name', 'tag 2')->first()->id;
        $this->post1->tags()->detach($tag_a_suppr);                   // Supprime 1 tag de l'article
        $this->assertEquals(1, $this->post1->tags()->count());        // test que le nbr de tags est bien 1
        $this->assertEquals('tag 1' , $this->post1->tags()->first()->name);
    }
}
