<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Facility;
use App\Models\FacilityType;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacilityType::factory()->create([
            'sport' => 'Badminton',
        ]);
        
        FacilityType::factory()->create([
            'sport' => 'Tennis',
        ]);

        FacilityType::factory()->create([
            'sport' => 'Table Tennis',
        ]);

        FacilityType::factory()->create([
            'sport' => 'Football',
        ]);
        
        FacilityType::factory()->create([
            'sport' => 'Basketball',
        ]);

        Facility::factory()
        ->count(10)
        ->state(new Sequence(
            ['is_indoor' => 1],
            ['is_indoor' => 0],
        ))
        ->create();
    }
}
