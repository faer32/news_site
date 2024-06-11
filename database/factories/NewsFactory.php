<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'heading' => $this->faker->sentence,
            'release_date' => $this->faker->date,
            'text' => $this->faker->paragraphs(3, true),
            'id_users' => User::factory(),
        ];
    }
}
