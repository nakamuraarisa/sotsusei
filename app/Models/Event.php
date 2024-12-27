<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // 編集可能なカラムを設定（セキュリティ）
    protected $fillable = [
        'title',
        'place',
        'start_time',
        'end_time',
        'reward',
        'image_path',
    ];

    //EventDateモデルとのリレーション
    public function event_dates()
    {
        return $this->hasMany(EventDate::class);
    }
}
