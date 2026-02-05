<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User ; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancie>
 */
class VacancieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => User::role('recruiter')-> inRandomOrder()->first()->id ,

            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(3),

            'image' => 'default_vacancy.png' ,

            'contract_type' => fake()->randomElement(['CDI', 'CDD', 'Freelance', 'Stage', 'Anapec']),
            'location' => fake()->city(),
            'status' => 'open',
            'finish_at' => fake()->dateTimeBetween('now', '+2 months'),

        ];
    }
}
