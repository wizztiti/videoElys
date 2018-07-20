<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function tagsCompletion(Request $request) {
        $term = $request->get('term');
        return Tag::select('name')
            ->where('name', 'LIKE', $term . '%')
            ->get()
            ->map(function($tag){
                return [
                    'id' => $tag->name,
                    'value' => $tag->name,
                    'label' => $tag->name
                ];
            });
    }
}
