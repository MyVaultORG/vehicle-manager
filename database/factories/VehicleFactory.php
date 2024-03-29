<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Vehicle::class;
    
    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        
        return [
            "brand" => $faker->vehicleBrand,
            "model" => $faker->vehicleModel,
            "board" => $faker->vehicleRegistration,
        ];
    }
}
