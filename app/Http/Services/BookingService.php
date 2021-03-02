<?php

namespace App\Http\Services;

use App\Models\Booking;
use App\Models\Driver;

class BookingService {
    private $driverModels;
    private $bookingModels;

    public function __construct(Booking $bookingModels, Driver $driverModels)
    {
        $this->driverModels = $driverModels;
        $this->bookingModels = $bookingModels;
    }

    /**
     * This function will be return reports data
     */
    public function reportData(){
        // This query is for get driver data with specific email criteria
        // and relations with bookings table
        $get_driver_data = $this->driverModels->where( function ($query) {
            $email_filter = ['fvtaxi', 'fvdrive'];
            foreach($email_filter as $filter){
                $query->orWhere('email', 'LIKE', '%'.$filter.'%');
            }
        })->with('bookings')->get();

        // variable to collect the driver data
        // which match with the filter;
        $driver_recap = array();
        if(count($get_driver_data) > 0){
            foreach ($get_driver_data as $driver) {
                // Initiate total completed orrder value
                $number_of_completed_rides = 0;
                $number_of_cancelled_rides = 0;
                $total_fare = 0.0;
                $total_commission = 0.0;
                $number_of_unique_passengers = 0;

                // Checking is the drivers has orders?
                if($driver->bookings && count($driver->bookings) > 0){
                    foreach ($driver->bookings as $booking) {
                        // Set the field for number of get completed order and total fare
                        // with criteria booking state is completed
                        if($booking->state == 'COMPLETED'){
                            $number_of_completed_rides += 1;
                            $total_fare += $booking->fare;
                        }else{
                            $number_of_cancelled_rides += 1;
                        }
                    }

                    // This function is used to colllect unique passengers 
                    $unique_passenger = $driver->bookings->where('state','COMPLETED')->unique('passenger_id');
                    $number_of_unique_passengers = count($unique_passenger);

                    $total_commission = floatval(number_format(($total_fare * 0.2), 2, '.',  ''));

                    if($number_of_completed_rides >= 10 && $number_of_unique_passengers <= 5){
                        array_push($driver_recap, [
                            'driver_id' => $driver['driver_id'],
                            'number_of_completed_rides' => $number_of_completed_rides,
                            'number_of_cancelled_rides' => $number_of_cancelled_rides,
                            'total_fare' => $total_fare,
                            'total_commission' => $total_commission,
                            'number_of_unique_passengers' => $number_of_unique_passengers
                        ]);
                    }
                }
            }
        }

        // Sort Data
        usort($driver_recap, function ($item1, $item2) {
            return $item2['number_of_completed_rides'] <=> $item1['number_of_completed_rides'];
        });

        return $driver_recap;
    }

    public function getAllDriver(){
        return $this->driverModels->get();
    }

    public function getAllBookingData(){
        return $this->bookingModels->get();
    }
}
