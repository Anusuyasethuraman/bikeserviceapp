<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;
    protected $table = 'booking_service';
    protected $fillable = [
        'customer_id',
        'service_id',
        'booking_date',
        'status',
    ];

    // Relationship with User (Customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relationship with Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
