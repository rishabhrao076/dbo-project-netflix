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

        Content::factory(10000)->create()->each(function ($content) use($genres,$languages){
            Media::factory()->count(rand(1,16))->create([
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
