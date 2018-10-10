<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FormationController extends Controller
{
    /**
     * Display the formation.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        return view('public.formation', [
            'formation' => 'formation-1',
        ]);
    }
}
