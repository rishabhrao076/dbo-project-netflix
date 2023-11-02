<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Content;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class ContentMediaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $languages = DB::table('languages')->get();
        $genres = DB::table('genre')->get();
        $contentCount = 1;

        Content::factory(10000)->create()->each(function ($content) use($genres,$languages,$contentCount){
            if($content->content_type == 1) {
                $contentCount = 1;
            }else {
                $contentCount = rand(1,16);
            }

            Media::factory()->count($contentCount)->create([
                'content_id' => $content->content_id,
            ]);

            // Insert Associated Language
            $languagesArray = $languages->random(rand(1,4))->pluck('language_id');
            $content->languages()->attach($languagesArray);

            // Insert Associated Genres
            $genresArray = $genres->random(rand(1,4))->pluck('genre_id');
            $content->genres()->attach($genresArray);
        });

    }
}
