<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    /**
     * Display the chapter.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $formation, $slug)
    {
        $chapter = Chapter::where('slug', '=' , $slug)->first();
        return view('public.chapter', [
            'chapter' => Chapter::where('slug', '=' ,$slug)->first(),
        ]);

    }
}
