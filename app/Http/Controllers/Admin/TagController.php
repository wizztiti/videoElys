<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $message = 'Problème lors de la création du tag'   ;

        try {
            $tag = Tag::create($request->only('name', 'slug'));

            if($tag) {
                flash('Le tag a bien été créé');
                return redirect(route('tag.edit', $tag));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('tag.index'));
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
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin/tag.form', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $message = 'Problème lors de la modification du tag';

        try {
            $tag->update($request->only('name', 'slug'));

            if($tag) {
                flash('Le tag a bien été modifié', 'success');
                return redirect(route('tag.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $message = 'Problème lors de la suppression du tag';

        try {
            $tag->delete();
            if($tag) {
                flash('Le tag a bien été supprimé', 'success');
                return redirect(route('tag.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('tag.index'));
    }
}
