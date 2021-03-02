<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingService;
use App\Http\Lib\ResponseFormatter;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function getAll(){
        $get_data = $this->bookingService->reportData();
        if(count($get_data) <= 0) {
            return ResponseFormatter::error(null, 'DATA_NOT_FOUND', 404);
        }

        return ResponseFormatter::success($get_data, 'GET_DATA');
    }

    public function index(){
        $driver_data = $this->bookingService->getAllDriver();
        $booking_data = $this->bookingService->getAllBookingData();
        $report_data = $this->bookingService->reportData();
        return view('pages.booking', [
            'driver_data' => $driver_data,
            'booking_data' => $booking_data,
            'reports' => $report_data
        ]);
    }

}
