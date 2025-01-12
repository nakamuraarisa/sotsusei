<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_date_id',
        'status',
    ];

    // ReservationはEventDateに属する（リレーション）
    public function eventDate()
    {
        return $this->belongsTo(EventDate::class, 'event_date_id');
    }
}
