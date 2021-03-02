<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Driver;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Driver::factory(10)->create()->each( function ($driver) {
            // Make a booking data
            $booking = Booking::factory(30)->make();
            $driver->bookings()->saveMany($booking);
        });
    }
}
