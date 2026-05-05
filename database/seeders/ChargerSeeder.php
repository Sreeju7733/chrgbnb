<?php

namespace Database\Seeders;

use App\Models\Charger;
use Illuminate\Database\Seeder;

class ChargerSeeder extends Seeder
{
    public function run()
    {
        $hosts = \App\Models\User::where('role', 'host')->pluck('id');
        
        $neighborhoods = [
            ['name' => 'Indiranagar', 'lat' => 12.9719, 'lng' => 77.6412],
            ['name' => 'Koramangala', 'lat' => 12.9345, 'lng' => 77.6101],
            ['name' => 'HSR Layout', 'lat' => 12.9100, 'lng' => 77.6450],
            ['name' => 'Whitefield', 'lat' => 12.9698, 'lng' => 77.7500],
            ['name' => 'Jayanagar', 'lat' => 12.9250, 'lng' => 77.5850],
            ['name' => 'MG Road', 'lat' => 12.9756, 'lng' => 77.6067],
            ['name' => 'Electronic City', 'lat' => 12.8452, 'lng' => 77.6632],
            ['name' => 'Malleshwaram', 'lat' => 12.9982, 'lng' => 77.5691],
            ['name' => 'Hebbal', 'lat' => 13.0354, 'lng' => 77.5988],
            ['name' => 'Sarjapur', 'lat' => 12.8566, 'lng' => 77.7289],
            ['name' => 'Banashankari', 'lat' => 12.9254, 'lng' => 77.5468],
            ['name' => 'Rajajinagar', 'lat' => 12.9897, 'lng' => 77.5550],
            ['name' => 'Yeshwanthpur', 'lat' => 13.0235, 'lng' => 77.5550],
            ['name' => 'Bannerghatta', 'lat' => 12.8354, 'lng' => 77.5868],
            ['name' => 'BTM Layout', 'lat' => 12.9165, 'lng' => 77.6101]
        ];

        $chargerTypes = ['ultra_fast', 'fast_dc', 'fast_ac', 'slow_ac'];
        $models = ['ABB Terra HP', 'Delta DC Wallbox', 'Tesla Supercharger V3', 'ChargePoint Home', 'Wallbox Pulsar Plus', 'Schneider Electric EVlink', 'Siemens VersiCharge'];

        foreach ($neighborhoods as $area) {
            // Create 8-12 chargers per neighborhood for higher density
            $count = rand(8, 12);
            for ($i = 1; $i <= $count; $i++) {
                $type = $chargerTypes[array_rand($chargerTypes)];
                $power = match($type) {
                    'ultra_fast' => rand(150, 350),
                    'fast_dc' => rand(50, 120),
                    'fast_ac' => rand(22, 43),
                    default => rand(7, 11)
                };

                Charger::create([
                    'host_id' => $hosts->random(),
                    'label' => $area['name'] . ' ' . ($type === 'ultra_fast' ? 'Express' : 'Station') . ' #' . rand(10, 99),
                    'charger_type' => $type,
                    'power_kw' => $power,
                    'model' => $models[array_rand($models)],
                    'address' => rand(1, 200) . ', Main Road, ' . $area['name'] . ', Bangalore',
                    'landmark' => 'Near ' . $area['name'] . ' Junction',
                    'latitude' => $area['lat'] + (rand(-100, 100) / 10000), // Random offset ~1km
                    'longitude' => $area['lng'] + (rand(-100, 100) / 10000),
                    'base_price_per_hour' => match($type) {
                        'ultra_fast' => rand(300, 450),
                        'fast_dc' => rand(150, 250),
                        default => rand(40, 120)
                    },
                    'status' => 'active'
                ]);
            }
        }
    }
}