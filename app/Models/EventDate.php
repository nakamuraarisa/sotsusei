<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    use HasFactory;

    // 編集可能なカラムを設定（セキュリティ）
    protected $fillable = [
        'event_id',
        'date',
    ];

    //EventDateはEventに属する（リレーション）
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'event_date_id');
    }

}

