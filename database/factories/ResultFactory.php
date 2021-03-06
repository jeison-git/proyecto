<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Result::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'quiz_id' => rand(1, 10),
            'point'   => rand(20, 100),
            'correct_answer' => rand(1, 15),
            'wrong_answer'   => rand(1, 15),
        ];
    }
}
