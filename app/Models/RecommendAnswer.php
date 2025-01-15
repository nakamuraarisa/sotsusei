<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendAnswer extends Model
{
    use HasFactory;

    protected $table = 'recommend_answers';

    protected $fillable = [
        'user_id',
        'answer_1',
        'answer_2',
        'answer_3',
    ];

    protected $casts = [
        'answer_1' => 'array',
    ];

    /**
     * Userモデルとのリレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
