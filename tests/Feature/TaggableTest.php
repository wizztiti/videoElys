<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaggableTest extends TestCase
{

    use RefreshDatabase;

    public $category1;
    public $post1, $post2;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->category1 = Category::create([
            'name' => 'cat1',
            'slug' => 'cat1'
        ]);

        $this->post1 = Post::create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
            'category_id' => $this->category1->id
        ]);

        $this->post2 = Post::create([
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'slug' => 'article-2',
            'category_id' => $this->category1->id
        ]);
    }

    public function test_CreateTags()
    {
        $this->post1->saveTags('tag1,tag2,tag3,tag3');
        $this->assertEquals(3, Tag::count());
        $this->assertEquals(3, DB::table('post_tag')->count());
    }

    public function test_EmptyTags()
    {
        $this->post2->saveTags('');
        $this->assertEquals(0, Tag::count());
    }

    public function test_reuseTags() {
        $this->post1->saveTags(' tag1, tag2, tag3, , , ,');
        $this->post2->saveTags('tag1 ,tag4');
        $this->assertEquals(4, Tag::count());
        $this->assertEquals(3, DB::table('post_tag')->where('post_id', $this->post1->id)->count());
        $this->assertEquals(2, DB::table('post_tag')->where('post_id', $this->post2->id)->count());
    }

    public function test_deleteFromPivotTable() {
        $this->post1->saveTags(' tag1, tag2, tag3');
        $this->post1->delete();
        $this->assertEquals(0, DB::table('post_tag')->count());
    }
}
