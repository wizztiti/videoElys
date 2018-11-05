<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChapterRequest;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Support\Facades\Log;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {;
        //dd(Chapter::first()->formation);
        return view('admin.chapter.index', [
            'chapters' => Chapter::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chapter.form', [
            'formations' => Formation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChapterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        $message = 'Problème lors de la création du chapitre';

        try {
            $request = $request->only('title', 'text', 'slug', 'formation_id');
            $request['num'] = null;
            $chapter = Chapter::create($request);
            //$post->saveTags($request->get('tags'));

            if($chapter) {
                flash('Le chapitre a bien été créé');
                return redirect(route('admin.chapter.index', $chapter));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.chapter.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        return view('admin/chapter.form', [
            'formations' => Formation::all(),
            'chapter' => $chapter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Formation $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterRequest $request, Chapter $chapter)
    {
        $message = 'Problème lors de la modification du chapitre'   ;

        try {
            $chapter->update($request->only('title', 'text', 'slug', 'formation_id'));
            //$chapter->saveTags($request->get('tags'));

            if($chapter) {
                flash('Le chapitre a bien été modifié', 'success');
                return redirect(route('admin.chapter.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.chapter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $message = 'Problème lors de la suppression du chapitre';

        try {
            $chapter->delete();
            if($chapter) {
                flash('Le chapitre a bien été supprimé', 'success');
                return redirect(route('admin.chapter.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.chapter.index'));
    }
}
