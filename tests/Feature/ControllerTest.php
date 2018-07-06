<?php
namespace Tests\Feature;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControllerTest extends TestCase
{
    /**
     * Vérifie que l'action INDEX retourne bien une vue
     *
     * @return void
     */
    public function test_Admin_CategoryController_Index()
    {
        $response = $this->get('admin/category');

        $response->assertStatus(200);
    }


    /**
     * Vérifie que l'action Create retourne bien la vue
     *
     * @return void
     */
    public function test_Admin_CategoryController_Create()
    {
        $response = $this->get(route('category.create'));

        $response->assertStatus(200);
    }

    /**
     * Vérifie que l'action Store crée bien une Catégorie
     *
     * @return $category
     */
    public function test_Admin_CategoryController_Store()
    {
        $request = CategoryRequest::create('/category.store', 'POST',[
            'name'     =>     'cat1',
            'slug'     =>     '',
        ]);
        $controller = new CategoryController();

        $response = $controller->store($request);

        $this->assertEquals(302, $response->getStatusCode());
        $category = Category::where('name', 'cat1')->first();
        $this->assertNotNull($category);

        return $category;
    }

    /**
     * Vérifie que la demande d'édition d'une catégorie est ok
     *
     * @depends test_Admin_CategoryController_Store
     * @return void
     */
    public function test_Admin_CategoryController_Edit($category)
    {
        $response = $this->get('admin/category/'. $category->id .'/edit');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Vérifie que le modification d'une catégorie est ok
     *
     * @return void
     */
    public function test_Admin_CategoryController_Update()
    {
        $category = Category::where('name', 'cat1')->first();
        $category_id = $category->id;
        $request = CategoryRequest::create('/category.update', 'PUT',[
            'name'     =>     'cat2',
            'slug'     =>     'cat2',
        ]);

        $controller = new CategoryController();
        $response = $controller->update($request, $category);

        $this->assertEquals(302, $response->getStatusCode());
        $category = Category::where('id', $category_id)->first();
        $this->assertEquals('cat2', $category->name);
    }

    /**
     * Vérifie que la suppression d'une catégorie est ok
     *
     * @return void
     */
    public function test_Admin_CategoryController_Destroy()
    {
        $category = Category::all()->first();
        $category_id = $category->id;

        $controller = new CategoryController();
        $response = $controller->destroy($category);

        $this->assertEquals(302, $response->getStatusCode());
        $response = Category::where('id', $category_id)->first();
        $this->assertEquals(null, $response);
    }
}