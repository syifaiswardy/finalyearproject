<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'bookings';
    protected $fillable = [
        'booking_notes',
        'start_dateTime',
        'end_dateTime',
        'booked_room',
        'booked_type',
        'booking_package',
        'booking_total',
        'rentEquip',
        'rentEquip_price',
        'file_path',
        'total_payment',

    ];

}
