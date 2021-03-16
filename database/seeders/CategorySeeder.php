<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Lenguaje de Programacion I'
        ]);
        Category::create([
            'name' => 'Lenguaje de Programacion II'
        ]);
        Category::create([
            'name' => 'Bases de Datos'
        ]);
        Category::create([
            'name' => 'Sistemas Mecanizados'
        ]);
    }
}
