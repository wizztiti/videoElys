<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::with('tags')->get()->load('category'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $message = 'Problème lors de la création de l\'article'   ;

        try {
            $post = Post::create($request->only('title', 'text', 'slug', 'category_id'));
            $post->saveTags($request->get('tags'));

            if($post) {
                flash('L\'article a bien été créé');
                return redirect(route('post.index', $post));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('post.index'));
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
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin/post.form', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $message = 'Problème lors de la modification de l\'article'   ;

        try {
            $post->update($request->only('title', 'text', 'slug', 'category_id'));
            $post->saveTags($request->get('tags'));

            if($post) {
                flash('L\'article a bien été modifié', 'success');
                return redirect(route('post.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $message = 'Problème lors de la suppression de l\'article';

        try {
            $post->delete();
            if($post) {
                flash('L\'article a bien été supprimé', 'success');
                return redirect(route('post.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('post.index'));
    }

    /**
     *
     */
    public function tag($slug) {
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->with('tags')->get();
        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }
}