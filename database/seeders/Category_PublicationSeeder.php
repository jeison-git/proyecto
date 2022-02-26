<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category_Publication;

class Category_PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category_Publication::create([
            'name' => 'Libro'
        ]);
        Category_Publication::create([
            'name' => 'Ensayo'
        ]);
        Category_Publication::create([
            'name' => 'Informe'
        ]);
        Category_Publication::create([
            'name' => 'Tesis'
        ]);
        Category_Publication::create([
            'name' => 'Reglamento'
        ]);
        Category_Publication::create([
            'name' => 'Cuentos'
        ]);
        Category_Publication::create([
            'name' => 'Trivias'
        ]);
        Category_Publication::create([
            'name' => 'Frases'
        ]);
        Category_Publication::create([
            'name' => 'Reflexiones'
        ]);
        Category_Publication::create([
            'name' => 'Cientifico'
        ]);
        Category_Publication::create([
            'name' => 'Otro'
        ]);
    }
}
