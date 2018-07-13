<?php

namespace App\Http\Controllers\Admin;


use App\Models\Video;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VideoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $message = 'Problème lors de la création de la vidéo';

        try {
            $video = Video::create($request->only('title', 'slug', 'description', 'duration', 'teaser_url', 'video_file'));

            if($video) {
                flash('La vidéo a bien été créée');
                return redirect(route('video.index', $video));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('video.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin/video.form', [
            'video' => $video
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VideoRequest $request
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, Video $video)
    {
        $message = 'Problème lors de la modification de l\'article'   ;

        try {
            $video->update($request->only('title', 'slug', 'description', 'duration', 'teaser_url', 'video_file'));

            if($video) {
                flash('La vidéo a bien été modifiée', 'success');
                return redirect(route('video.index'));
            }
        } catch(\Exception $exception) {
            flash($message, 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
        }
        flash($message, 'warning');
        return redirect(route('video.index'));
    }
}
