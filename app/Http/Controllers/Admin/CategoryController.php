<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $message = 'Problème lors de la création de la catégorie'   ;

        try {
            $category = Category::create($request->only('name', 'slug'));

            if($category) {
                flash('La catégorie a bien été créée');
                return redirect(route('admin.category.index', $category));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.category.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin/category.form', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $message = 'Problème lors de la modification de la catégorie';

        try {
            $category->update($request->only('name', 'slug'));

            if($category) {
                flash('La catégorie a bien été modifiée', 'success');
                return redirect(route('admin.category.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $message = 'Problème lors de la suppression de la catégorie';

        try {
            $category->delete();
            if($category) {
                flash('La catégorie a bien été supprimée', 'success');
                return redirect(route('category.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.category.index'));
    }
}
