<?php

namespace Database\Factories\Models;

use App\Models\Models\Booking;
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
            'created_at_local' => $this->faker->dateTime,
            'passenger_id' => $this->faker->randomDigitNotNull,
            'state' => $this->faker->randomElement([
                Booking::STATE_COMPLETED,
                Booking::STATE_CANCELLED_DRIVER,
                Booking::STATE_CANCELLED_PASSENGER,
            ]),
            'country_id' => $this->faker->randomDigitNotNull,
            'fare' => $this->faker->randomFloat(2, 2, 123802),
        ];
    }
}
