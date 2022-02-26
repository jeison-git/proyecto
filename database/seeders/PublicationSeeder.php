<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publication::factory(20)->create();

        /* foreach($publications as $publication){

            Review::factory(5)->create([
                'publication_id' => $publication->id
            ]);

            Image::factory(1)->create([
                    'imageable_id' => $publication->id,
                    'imageable_type' => 'App\Models\Publication'
                ]);
    } */
    }
}
