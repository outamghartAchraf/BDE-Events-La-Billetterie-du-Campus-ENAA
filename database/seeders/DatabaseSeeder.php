<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Registration;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

              // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('achrafachraf'),
        ]);

        // Students
        User::factory(20)->create([
            'role' => 'student',
        ]);

        // Events
        Event::factory(15)->create();

       $users = User::where('role', 'student')->get();
$events = Event::all();

foreach ($users as $user) {

     foreach ($events->random(rand(1, 3)) as $event) {

        Registration::factory()->create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

    }
}
 
    }
}
