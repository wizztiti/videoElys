<?php

namespace App\Http\Controllers;

use App\Models\Formation;
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
            'formation' => Formation::where('slug', $slug)->first(),
        ]);
    }
}
