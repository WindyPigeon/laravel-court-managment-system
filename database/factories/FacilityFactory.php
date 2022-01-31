<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FacilityType;

class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facility_type_id' => $this->faker->randomElement(FacilityType::all())->id,
            'location' => $this->faker->address(),
            'cost_per_hour' => $this->faker->randomFloat(2, 0, 10),
            'number_of_courts' => $this->faker->numberBetween(1, 10),
        ];
    }
}
