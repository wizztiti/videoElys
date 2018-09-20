<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display all resume posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.post-index', [
            'posts' => Post::with('tags')->get()->load('category'),
        ]);
    }

    /**
     * Display all resume posts of category.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->with('category')->get();
        return view('public.post-index', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Display all resume posts of tag.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->with('tag')->get();
        return view('public.post-index', [
            'tag' => $tag,
            'posts' => $posts
        ]);
    }

    /**
     * Display the post.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        return view('public.post', [
            'post' => Post::where('slug', $slug)->first(),
        ]);
    }
}
