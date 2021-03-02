@extends('main')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Driver Booking Reports</h2>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Driver ID</th>
                    <th scope="col">Number of Completed Rides</th>
                    <th scope="col">Number of Cancelled Rides</th>
                    <th scope="col">Total Fare</th>
                    <th scope="col">Total Commission</th>
                    <th scope="col">Number of Unique Passengers</th>
                  </tr>
                </thead>
                <tbody>
                
                    @foreach ($reports  as $report)
                        <tr>
                            <th scope="row"> {{ $report['driver_id'] }}</th>
                            <td>{{ $report['number_of_completed_rides'] }}</td>
                            <td>{{ $report['number_of_cancelled_rides'] }}</td>
                            <td>{{ $report['total_fare'] }}</td>
                            <td>{{ $report['total_commission'] }}</td>
                            <td>{{ $report['number_of_unique_passengers'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Driver List</h3>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Driver ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($driver_data  as $driver)
                        <tr>
                            <th scope="row"> {{ $driver->driver_id  }}</th>
                            <td>{{ $driver->name  }}</td>
                            <td>{{ $driver->phone_number  }}</td>
                            <td>{{ $driver->email  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Booking List</h3>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Booking ID/th>
                    <th scope="col">Driver ID</th>
                    <th scope="col">Passenger ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($booking_data  as $booking)
                        <tr>
                            <th scope="row"> {{ $booking->booking_id  }}</th>
                            <td>{{ $booking->driver_id  }}</td>
                            <td>{{ $booking->passenger_id  }}</td>
                            <td>{{ $booking->state  }}</td>
                            <td>{{ $booking->fare  }}</td>
                            <td>{{ $booking->created_at_local  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection