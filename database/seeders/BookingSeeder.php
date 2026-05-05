<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Charger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $drivers = User::where('role', 'driver')->pluck('id');
        $chargers = Charger::all();

        // Generate 500 historical bookings for high density
        for ($i = 1; $i <= 500; $i++) {
            $charger = $chargers->random();
            $startTime = Carbon::now()->subDays(rand(1, 30))->addHours(rand(1, 24));
            $duration = rand(1, 4);
            $endTime = (clone $startTime)->addHours($duration);
            
            $status = rand(1, 10) > 2 ? 'completed' : (rand(1, 2) === 1 ? 'confirmed' : 'cancelled');

            Booking::create([
                'driver_id' => $drivers->random(),
                'charger_id' => $charger->id,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'total_price' => $charger->base_price_per_hour * $duration,
                'status' => $status,
                'created_at' => $startTime->subHours(rand(1, 48)), // Booked before start
            ]);
        }
    }
}
