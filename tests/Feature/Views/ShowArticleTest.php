<?php

namespace Tests\Feature\Views;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class ShowArticleTest extends TestCase
{
    use RefreshDatabase;

    public $category1;

    public $post1;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->category1 = Category::create([
            'name' => 'category1',
            'slug' => null
        ]);

        $this->post1 = $this->category1->posts()->create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
        ]);
    }


    /**
     * @test
     *
     * @return void
     */
    function test_show_an_article()
    {
        //$this->withExceptionHandling();

        $this->get(route('blog.post', ['category' => $this->category1->slug , 'post' => $this->post1->slug]))
            ->assertSuccessful()
            ->assertViewIs('public.post')
            ->assertSee('titre de l\'article numéro 1')
            ->assertSee('un text tres long de l\'article numéro 1')
            ->assertSee('category1');
    }
}