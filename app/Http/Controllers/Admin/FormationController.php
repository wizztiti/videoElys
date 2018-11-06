<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormationRequest;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formation.index', [
            'formations' => Formation::get()->load('category'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formation.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FormationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {
        $message = 'Problème lors de la création de la formation'   ;

        try {
            $formation = Formation::create($request->only('title', 'resume', 'slug', 'category_id', 'teaser_path'));
            //$post->saveTags($request->get('tags'));

            if($formation) {
                flash('La formation a bien été créée');
                return redirect(route('admin.formation.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.formation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        $chapters = $formation->chapters()->get()->sortBy('num');
        return view('admin/formation.form', [
            'formation' => $formation,
            'categories' => Category::all(),
            'chapters' => $chapters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function update(FormationRequest $request, Formation $formation)
    {
        $message = 'Problème lors de la modification de la formation';

        try {
            $this->setSummary($request, $formation);

            $formation->update($request->only('title', 'resume', 'slug', 'category_id', 'teaser_path'));
            //$formation->saveTags($request->get('tags'));

            if($formation) {
                flash('La formation a bien été modifiée', 'success');
                return redirect(route('admin.formation.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.formation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $message = 'Problème lors de la suppression de la formation';

        try {
            $formation->delete();
            if($formation) {
                flash('La formation a bien été supprimée', 'success');
                return redirect(route('admin.formation.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('admin.formation.index'));
    }

    public function setSummary(FormationRequest $request, Formation $formation) {
        // Définition du sommaire
        $summary = $request->summary;
        $formation->chapters()->each(function($chapter, $key) {
            $chapter->update(['num' => 0]);
        });
        if($summary){
            foreach ($summary as $index => $IDchapter) {
                Chapter::where('id', '=', $IDchapter)->update(['num' => $index]);
            }
        }
    }
}
