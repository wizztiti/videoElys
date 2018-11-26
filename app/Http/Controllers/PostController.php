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
            'posts' => Post::all()->sortByDesc('created_at'),
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
        $posts = $category->posts()->with('category')->get()->sortByDesc('created_at');
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
        $posts = $tag->posts()->with('tag')->get()->sortByDesc('created_at');
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
        $post = Post::where('slug', $slug)->first();
        $postLinks = $post->tags->flatMap->posts->unique('id')->where('id', '!=', $post->id) ;
        return view('public.post', [
            'post' => $post,
            'postLinks' => $postLinks->sortByDesc('created_at'),
            'formationLinks' => $post->tags->flatMap->formations->unique('id')->sortByDesc('created_at'),
        ]);
    }
}
