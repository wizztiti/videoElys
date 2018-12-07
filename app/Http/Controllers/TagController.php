<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function indexTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->with('tag')->get()->sortByDesc('created_at');
        $formations = $tag->formations()->with('tag')->get()->sortByDesc('created_at');
        return view('public.tag-index', [
            'tag' => $tag,
            'posts' => $posts,
            'formations' => $formations,
        ]);
    }
}
