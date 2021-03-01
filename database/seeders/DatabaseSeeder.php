<?php

namespace Database\Seeders;

use App\Models\Models\Booking;
use App\Models\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

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
            $booking = Booking::factory(3)->make();
            $driver->bookings()->saveMany($booking);
        });
    }
}
