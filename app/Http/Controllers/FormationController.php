<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Category;
use Illuminate\Http\Request;


class FormationController extends Controller
{
    /**
     * Display all resume formations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.formation-index', [
            'formations' => Formation::get()->load('category'),
        ]);
    }


    /**
     * Display the formation.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        $formation = Formation::where('slug', $slug)->first();
        $chapters = $formation->chapters()->get()->sortBy('num');

        return view('public.formation', [
            'formation' => $formation,
            'chapters' => $chapters
        ]);
    }

    /**
     * Display all resume formations of category.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $formations = $category->formations()->with('category')->get();
        return view('public.formation-index', [
            'category' => $category,
            'formations' => $formations
        ]);
    }

}
