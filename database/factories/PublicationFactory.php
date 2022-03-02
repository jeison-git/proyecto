<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\Category_Publication;
use App\Models\Date;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title'       => $title,
            'subtitle'    => $this->faker->sentence(),
            'author'      => $this->faker->name(),
            'gender'      => $this->faker->word(),
            'slug'        => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'status'      => $this->faker->randomElement([Publication::SOLICITAR, Publication::REVISION, Publication::APROVADO]),
            'user_id'     => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'category_publication_id' => Category_Publication::all()->random()->id,
            'language_id' => Language::all()->random()->id,
            'date_id'     => Date::all()->random()->id,
           /*  'url' => 'publications/' . $this->faker->image('public/storage/publications', 600, 400, null, false), */

        ];
    }
}
