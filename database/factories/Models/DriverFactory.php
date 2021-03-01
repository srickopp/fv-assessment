<?php

namespace Database\Factories\Models;

use App\Models\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'email' => strtolower($this->faker->firstName).'@'.$this->faker->randomElement(['fvtaxi.com','fvdrive.com','gmail.com'])
        ];
    }
}
