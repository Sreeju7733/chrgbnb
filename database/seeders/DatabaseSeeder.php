<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Account
        User::factory()->create([
            'name' => 'System Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Default Driver Account
        User::factory()->create([
            'name' => 'Professional Driver',
            'email' => 'driver@example.com',
            'role' => 'driver',
        ]);

        // Default Host Account
        User::factory()->create([
            'name' => 'Property Host',
            'email' => 'host@example.com',
            'role' => 'host',
        ]);

        // Generate 20 random Drivers
        User::factory()->count(20)->create(['role' => 'driver']);

        // Generate 25 random Hosts
        User::factory()->count(25)->create(['role' => 'host']);

        // Call the ChargerSeeder
        $this->call(ChargerSeeder::class);

        // Call the BookingSeeder (I will create this)
        $this->call(BookingSeeder::class);
    }
}