<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\Image;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $publications = Publication::factory(20)->create();

         foreach($publications as $publication){

            /* Review::factory(5)->create([
                'publication_id' => $publication->id
            ]); */

            Publication::factory(1)->create([
                    'imageable_id' => $publication->id,
                    'imageable_type' => 'App\Models\Publication'
                ]);
    }
    }
}
