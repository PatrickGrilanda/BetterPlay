<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function player(Request $request)
    {
        $videoId = $request->route('id');

        $video = Video::find($videoId);

        return view('player', ['video' => $video]);
    }
}
