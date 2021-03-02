<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const STATE_COMPLETED = 'COMPLETED';
    const STATE_CANCELLED_PASSENGER = 'CANCELLED_PASSENGER';
    const STATE_CANCELLED_DRIVER = 'CANCELLED_DRIVER';

    protected $primaryKey = 'booking_id';
    protected $guard = [];

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

}
