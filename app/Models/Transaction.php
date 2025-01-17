<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'title',
        'amount',
        'description',
        'month',
        'year',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    const TYPE_INCOME = 'income';
    const TYPE_EXPENSE = 'expense';

    public static array $types = [
        self::TYPE_INCOME,
        self::TYPE_EXPENSE,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
