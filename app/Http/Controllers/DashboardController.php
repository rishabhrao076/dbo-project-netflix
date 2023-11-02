<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard() {
        $content = DB::select("select * from ( select a.*, row_number() over (partition by a.genre_id order by a.genre_id,a.added_on desc) as rn from ( select distinct on (contents.content_id) contents.*, genre.genre, genre.genre_id from contents join content_genre on content_genre.content_id = contents.content_id join genre on genre.genre_id = content_genre.genre_id ) as a order by genre_id ) as b where rn <= 20");
        $content = collect($content)->groupBy('genre');
        return view('dashboard',compact('content'));
    }

    public function movies() {
        $content = DB::select("select * from ( select a.*, row_number() over (partition by a.genre_id order by a.genre_id,a.added_on desc) as rn from ( select distinct on (contents.content_id) contents.*, genre.genre, genre.genre_id from contents join content_genre on content_genre.content_id = contents.content_id join genre on genre.genre_id = content_genre.genre_id where contents.content_type = 1) as a order by genre_id ) as b where rn <= 20");
        $content = collect($content)->groupBy('genre');
        return view('dashboard',compact('content'));
    }

    public function tvShows() {
        $content = DB::select("select * from ( select a.*, row_number() over (partition by a.genre_id order by a.genre_id,a.added_on desc) as rn from ( select distinct on (contents.content_id) contents.*, genre.genre, genre.genre_id from contents join content_genre on content_genre.content_id = contents.content_id join genre on genre.genre_id = content_genre.genre_id where contents.content_type = 2) as a order by genre_id ) as b where rn <= 20");
        $content = collect($content)->groupBy('genre');
        return view('dashboard',compact('content'));
    }
}
