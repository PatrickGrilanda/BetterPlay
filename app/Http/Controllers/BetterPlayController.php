<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BetterPlayController extends Controller
{
    public function index()
    {
        $popular = Video::latest()->first();

        $trending = Video::whereHas('categories', function ($query) {
            //  $query->where('name', 'Animação');
        })->get();

        $comedies = Video::whereHas('genres', function ($query) {
            //  $query->where('name', 'Aventura');
        })->get();

        $action =  Cache::remember('movies', 60 * 60, function () {
            return Video::get();
        });
        $western =  Cache::remember('movies', 60 * 60, function () {
            return Video::get();
        });
        $horror =  Cache::remember('movies', 60 * 60, function () {
            return Video::get();
        });
        $thriller =  Cache::remember('movies', 60 * 60, function () {
            return Video::get();
        });
        $animation = Cache::remember('movies', 60 * 60, function () {
            return Video::get();
        });


            return view('main', [
                'popular' => $popular,
                'trending' => $trending,
                'comedies' => $comedies,
                'western' => $western,
                'action' => $action,
                'horror' => $horror,
                'thriller' => $thriller,
                'animation' => $animation,
        ]);
    }
}
