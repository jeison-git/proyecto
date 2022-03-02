<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('cursos');

        Storage::deleteDirectory('resources');

        Storage::deleteDirectory('publications');

        Storage::makeDirectory('cursos');

        Storage::makeDirectory('resources');

        Storage::makeDirectory('publications');

        // \App\Models\User::factory(10)->create();

        $this->call(PermissionSeeder::class);

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(LevelSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(PriceSeeder::class);

        $this->call(PlatformSeeder::class);

        $this->call(CourseSeeder::class);

        $this->call(Category_PublicationSeeder::class);

        $this->call(LanguageSeeder::class);

        $this->call(DateSeeder::class);

        $this->call(PublicationSeeder::class);

        $this->call(QuizSeeder::class);

        $this->call(QuestionSeeder::class);

        $this->call(AnswerSeeder::class);

        $this->call(ResultSeeder::class);
    }
}
