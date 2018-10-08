<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Admin\PostController;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public $category1;

    public $post1;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->category1 = Category::create([
           'name' => 'cat1',
            'slug' => 'cat1'
        ]);
        $this->category2 = Category::create([
            'name' => 'cat2',
            'slug' => 'cat2'
        ]);

        $this->post1 = $this->category1->posts()->create([
            'title' => 'titre de l\'article numéro 1',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',
        ]);
    }

    /**
     * Vérifie que l'action INDEX retourne bien une vue
     *
     * @return void
     */
    public function test_Admin_PostController_Index()
    {
        $this->withExceptionHandling();
        $response = $this->get(action('Admin\PostController@index'));
        $response->assertStatus(200);
    }

    /**
     * Vérifie que l'action Create retourne bien la vue
     *
     * @return void
     */
    public function test_Admin_PostController_Create()
    {
        $response = $this->get(action('Admin\PostController@create'));
        $response->assertStatus(200);
    }

    /**
     * Vérifie que l'action Store crée bien un article
     *
     * @return $post
     */
    public function test_Admin_PostController_Store()
    {
        // Arrange
        $request = PostRequest::create('/post.store', 'POST',[
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-2',
            'category_id' => $this->category1->id,
        ]);
        $controller = new PostController();

        // Act
        $response = $controller->store($request);
        $post = Post::where('title', 'titre de l\'article numéro 1')->first();

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotNull($post);
    }

    /**
     * Vérifie que la création d'un article avec un titre déjà existant retourne une erreur
     *
     * @return void
     */
    public function test_Admin_PostController_Store_Error_On_Title()
    {
        // Arrange
        $controller = new PostController();
        $request = PostRequest::create('/post.store', 'POST',[
            'title' => 'titre de l\'article numéro 1',   //  Titre déjà existant
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => '',
            'category_id' => $this->category1->id,
        ]);

        // Act
        $response = $controller->store($request);

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotEquals('success', session()->get('notification.type'));
    }

    /**
     * Vérifie que la création d'un article avec un slug déjà existant retourne une erreur
     *
     * @return void
     */
    public function test_Admin_PostController_Store_Error_On_Slug()
    {
        // Arrange
        $controller = new PostController();
        $request = PostRequest::create('/post.store', 'POST',[
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => 'article-1',                                   //  Slug déjà existant
            'category_id' => $this->category1->id,
        ]);

        // Act
        $response = $controller->store($request);

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotEquals('success', session()->get('notification.type'));
    }

    /**
     * Vérifie que la demande d'édition d'un article est ok
     *
     * @return void
     */
    public function test_Admin_PostController_Edit()
    {
        // Act
        $response = $this->get(action('Admin\PostController@edit', $this->post1));

        // Assert
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Vérifie que le modification d'un article est ok
     *
     * @return void
     */
    public function test_Admin_PostController_Update()
    {
        // Arange
        $request = PostRequest::create('/post.update', 'PUT',[
            'title' => 'titre de l\'article numéro 2',
            'text' => 'un text tres long de l\'article numéro 2',
            'slug' => 'article-2',
            'category_id' => $this->category2->id,
        ]);
        $controller = new PostController();

        // Act
        $response = $controller->update($request, $this->post1);

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('titre de l\'article numéro 2', $this->post1->title);
        $this->assertEquals('un text tres long de l\'article numéro 2', $this->post1->text);
        $this->assertEquals('article-2', $this->post1->slug);
        $this->assertEquals('cat2', $this->post1->category->name);
    }

    /**
     * Vérifie que la suppression d'un post est ok
     *
     * @return void
     */
    public function test_Admin_PostController_Destroy()
    {
        $post_id = $this->post1->id;

        $controller = new PostController();
        $response = $controller->destroy($this->post1);

        $this->assertEquals(302, $response->getStatusCode());
        $response = Post::where('id', $post_id)->first();
        $this->assertEquals(null, $response);
    }
}
