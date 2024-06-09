<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'patronymic' => $this->faker->firstName,
            'url_picture' => $this->faker->imageUrl,
            'signature' => $this->faker->sentence,
            'role' => $this->faker->randomElement(['admin', 'editor', 'user']), 
            'email' => $this->faker->unique()->safeEmail,
            'activate' => $this->faker->boolean,
            'creating_an_article' => $this->faker->boolean,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), 
            'remember_token' => Str::random(10),
        ];
    }
}
