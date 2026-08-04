<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'date' => fake()->dateTimeBetween('now', '+3 months'),
            'time' => fake()->time(),
            'location' => fake()->city(),
            'price' => fake()->randomElement([0, 0, 50, 100]),
            'capacity' => fake()->numberBetween(20, 200),
            'image_path' => null,
            'created_by' => User::where('role', 'admin')->inRandomOrder()->value('id'),
        ];
    }
}
