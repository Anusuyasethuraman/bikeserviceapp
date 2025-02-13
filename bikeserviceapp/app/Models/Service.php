<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    public function bookingservice()
    {
        return $this->hasMany(BookingService::class, 'service_id');
    }
}
