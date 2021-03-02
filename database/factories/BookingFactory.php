<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at_local' => now(),
            'passenger_id' => $this->faker->numberBetween(1,5),
            'state' => $this->faker->randomElement([
                Booking::STATE_COMPLETED,
                Booking::STATE_CANCELLED_DRIVER,
                Booking::STATE_CANCELLED_PASSENGER,
            ]),
            'country_id' => $this->faker->numberBetween(10,23),
            'fare' => $this->faker->randomFloat(2, 2, 123802),
        ];
    }
}
