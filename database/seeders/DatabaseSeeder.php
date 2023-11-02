<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BillingHistory;
use App\Models\CardInformation;
use App\Models\Content;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement("INSERT INTO genre (genre_id, genre_code, genre) VALUES
            (1, 'COM', 'Comedy'),
            (2, 'HORR', 'Horror'),
            (3, 'ACN', 'Action'),
            (4, 'SCIFI', 'Science-Fiction'),
            (5, 'ROM', 'Romance'),
            (6, 'THRL', 'Thriller'),
            (7, 'CRM', 'Crime'),
            (8, 'ADV', 'Adventure'),
            (9, 'BIO', 'Biographical'),
            (10, 'ROMCOM', 'Romantic Comedy'),
            (11, 'ANM', 'Animation'),
            (12, 'DRM', 'Drama'),
            (13, 'SPH', 'Superhero'),
            (14, 'MYS', 'Mystery'),
            (15, 'FNTSY', 'Fantasy'),
            (16, 'MSC', 'Musical');"
        );

        DB::statement("INSERT INTO languages(language_id, language_code, language) VALUES
            (1, 'AF', 'Afrikaans'),
            (2, 'SQ', 'Albanian'),
            (3, 'AR', 'Arabic'),
            (4, 'HY', 'Armenian'),
            (5, 'EU', 'Basque'),
            (6, 'BN', 'Bengali'),
            (7, 'BG', 'Bulgarian'),
            (8, 'CA', 'Catalan'),
            (9, 'KM', 'Cambodian'),
            (10, 'ZH', 'Chinese (Mandarin)'),
            (11, 'HR', 'Croatian'),
            (12, 'CS', 'Czech'),
            (13, 'DA', 'Danish'),
            (14, 'NL', 'Dutch'),
            (15, 'EN', 'English'),
            (16, 'ET', 'Estonian'),
            (17, 'FJ', 'Fiji'),
            (18, 'FI', 'Finnish'),
            (19, 'FR', 'French'),
            (20, 'KA', 'Georgian'),
            (21, 'DE', 'German'),
            (22, 'EL', 'Greek'),
            (23, 'GU', 'Gujarati'),
            (24, 'HE', 'Hebrew'),
            (25, 'HI', 'Hindi'),
            (26, 'HU', 'Hungarian'),
            (27, 'IS', 'Icelandic'),
            (28, 'ID', 'Indonesian'),
            (29, 'GA', 'Irish'),
            (30, 'IT', 'Italian'),
            (31, 'JA', 'Japanese'),
            (32, 'JW', 'Javanese'),
            (33, 'KO', 'Korean'),
            (34, 'LA', 'Latin'),
            (35, 'LV', 'Latvian'),
            (36, 'LT', 'Lithuanian'),
            (37, 'MK', 'Macedonian'),
            (38, 'MS', 'Malay'),
            (39, 'ML', 'Malayalam'),
            (40, 'MR', 'Marathi'),
            (41, 'MN', 'Mongolian'),
            (42, 'NE', 'Nepali'),
            (43, 'PL', 'Polish'),
            (44, 'PT', 'Portuguese'),
            (45, 'QU', 'Quechua'),
            (46, 'RO', 'Romanian'),
            (47, 'RU', 'Russian'),
            (48, 'SL', 'Slovenian'),
            (49, 'ES', 'Spanish'),
            (50, 'SW', 'Swahili'),
            (51, 'SV', 'Swedish'),
            (52, 'TA', 'Tamil'),
            (53, 'TE', 'Telugu'),
            (54, 'TH', 'Thai'),
            (55, 'TR', 'Turkish'),
            (56, 'UK', 'Ukrainian'),
            (57, 'UR', 'Urdu'),
            (58, 'UZ', 'Uzbek'),
            (59, 'VI', 'Vietnamese'),
            (60, 'CY', 'Welsh'),
            (61, 'XH', 'Xhosa');"
        );

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

        $billingPlans = [
            'Standard with ads' => 6.99,
            'Standard' => 15.49,
            'Premium' => 19.99,
        ];

        $allContent = Content::all();
        $allMedia = Media::all();

        User::factory(10000)->create()->each(function ($user) use($billingPlans,$allContent,$allMedia){
            //Insert Billing Information
            $plan = array_rand($billingPlans);
            $price = $billingPlans[$plan];
            BillingHistory::factory()->count(rand(1,10))->create([
                'user_id' => $user->user_id,
                'amount_paid' => $price,
                'plan' => $plan,
            ]);
            
            // Insert Card Information
            CardInformation::factory()->count(rand(1,3))->create([
                'user_id' => $user->user_id,
            ]);

            // Insert Watch History
            $watchedContentsArray = $allMedia->random(rand(0,15))->pluck('media_id');
            $insertArr = array();
            foreach($watchedContentsArray as $val) {
                $insertArr[$val] = ['progress' => "0".rand(0,5).":".rand(0,5).rand(0,9).":".rand(0,5).rand(0,9)];
            }
            $user->watchHistory()->attach($insertArr);

            // Insert Likes
            $likedContentsArr = $allContent->random(rand(0,15))->pluck('content_id');
            $insertArr = array();
            foreach($likedContentsArr as $val) {
                $insertArr[$val] = ['status' => rand(0,1)];
            }
            $user->likes()->attach($insertArr);
        });
    }
}
