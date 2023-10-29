<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function getMetadata(Request $request) {
        if($request->has('contentId')) {

            $metadata = DB::select("With contentlanguagesgenres as ( select contents.*, string_agg(distinct languages.language, ', ') as languages, string_agg(distinct genre.genre, ', ') as genres from contents join media on contents.content_id = media.content_id join content_language on contents.content_id = content_language.content_id join languages on content_language.language_id = languages.language_id join content_genre on content_genre.content_id = contents.content_id join genre on genre.genre_id = content_genre.genre_id where contents.content_id = ".$request->contentId." group by contents.content_id ) select contentlanguagesgenres.*, media.* from contentlanguagesgenres join media on media.content_id = contentlanguagesgenres.content_id;");

            return response()->json($metadata);
        }
    }
}
