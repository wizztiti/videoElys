<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\Admin\ChapterController;
use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Formation;
use App\Models\Tag;

class ChapterControllerTest extends TestCase
{
    use RefreshDatabase;

    private $categories = array();
    private $categoriesIDs = array();
    private $formations, $nbr_chapters;

    function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        // DEFINI LE NOMBRE DE CATEGORIES & FORMATION POUR CETTE SERIE DE TEST
        $nbr_categories = 3;
        $nbr_formations = 3;
        $nbr_chapters = 2;

        // Création des categories
        for($i = 1; $i <= $nbr_categories; $i++) {
            array_push($this->categories, factory(Category::class)->create(['name' => 'category-' . $i]));
        }
        Category::each(function($item, $key){
            array_push($this->categoriesIDs, $item->id);
        });

        // Création des formations
        for($i = 1; $i <= $nbr_formations; $i++) {
            $categoryIDRandom = $this->categoriesIDs[array_rand($this->categoriesIDs)];
            factory(Formation::class)->create(['category_id' => Category::where('id', '=', $categoryIDRandom)->first()]);
        }
        $this->formations = Formation::all();

        // Création des chapitres
        for($i = 1; $i <= $nbr_chapters; $i++) {
            factory(Chapter::class)->create();
        }
    }

    /**
     * Vérifie que l'action INDEX retourne bien une vue
     *
     * @return void
     */
    function test_Admin_ChapterController_Index()
    {
        $this->get(action('Admin\ChapterController@index'))
            ->assertStatus(200)
            ->assertViewIs('admin.chapter.index');
    }

    /**
     * Vérifie que l'action Create retourne bien la vue
     *
     * @return void
     */
    function test_Admin_ChapterController_Create()
    {
        $this->get(action('Admin\ChapterController@create'))
            ->assertStatus(200)
            ->assertViewIs('admin.chapter.form');
    }

    /**
     * Vérifie que l'action Store crée bien un chapitre
     *
     * @return $post
     */
    public function test_Admin_Chapter_Controller_Store()
    {
        // Arrange
        $request = ChapterRequest::create('/chapter.store', 'POST',[
            'title' => 'titre du chapitre 1',
            'text' => 'un text tres long du chapitre 1',
            'slug' => null,
        ]);
        $controller = new ChapterController();

        // Act
        $response = $controller->store($request);
        $chapter = Chapter::where('title', 'titre du chapitre 1')->first();

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotNull($chapter);
    }

    /**
     * Vérifie que la création d'un chapitre avec un titre déjà existant retourne une erreur
     *
     * @return void
     */
    public function test_Admin_ChapterController_Store_Error_On_Title()
    {
        // Arrange
        $controller = new ChapterController();
        $request = ChapterRequest::create('/chapter.store', 'POST',[
            'title' => Chapter::get()->first()->title,                                      //  Titre déjà existant
            'text' => 'un text tres long de l\'article numéro 1',
            'slug' => null,
        ]);

        // Act
        $response = $controller->store($request);

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotEquals('success', session()->get('notification.type'));
    }

    /**
     * Vérifie que la création d'un chapitre avec un slug déjà existant retourne une erreur
     *
     * @return void
     */
    public function test_Admin_ChapterController_Store_Error_On_Slug()
    {
        // Arrange
        $controller = new ChapterController();
        $request = ChapterRequest::create('/chapter.store', 'POST',[
            'title' => 'titre du chapitre numéro 33',
            'text' => 'un text tres long du chapitre numéro 33',
            'slug' => Chapter::first()->slug,                                                  // Slug déjà existant
        ]);

        // Act
        $response = $controller->store($request);

        // Assert
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertNotEquals('success', session()->get('notification.type'));
    }

    /**
     * Vérifie que la demande d'édition d'un chapitre est ok
     *
     * @return void
     */
    public function test_Admin_ChapterController_Edit()
    {
        $this->withoutExceptionHandling();

        // Act
        $response = $this->get(action('Admin\ChapterController@edit', Chapter::first()));

        // Assert
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Vérifie que la suppression d'un chapitre est ok
     *
     * @return void
     */
    public function test_Admin_ChapterController_Destroy()
    {
        $chapter = Chapter::first();
        $chapter_id = $chapter->id;

        $controller = new ChapterController();
        $response = $controller->destroy($chapter);

        $this->assertEquals(302, $response->getStatusCode());
        $response = Chapter::where('id', $chapter_id)->first();
        $this->assertEquals(null, $response);
    }
}
