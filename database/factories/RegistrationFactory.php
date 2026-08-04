<?php

namespace Database\Factories;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;

/**
 * @extends Factory<Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'user_id' => User::where('role', 'student')
                ->inRandomOrder()
                ->value('id'),

            'event_id' => Event::inRandomOrder()->value('id'),

     'status' => fake()->randomElement([
    'confirmed',
    'cancelled',
]),

            'reservation_code' => 'BDE-2026-' . strtoupper(Str::random(6)),
        ];
    }
}
