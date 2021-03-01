<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->timestamp('created_at_local');
            $table->unsignedBigInteger('driver_id');
            $table->integer('passenger_id')->unsigned();
            $table->enum('state', ['COMPLETED', 'CANCELLED_PASSENGER', 'CANCELLED_DRIVER']);
            $table->integer('country_id')->unsigned();
            $table->float('fare', 11, 2);
            $table->timestamps();
            $table->foreign('driver_id')->references('driver_id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
