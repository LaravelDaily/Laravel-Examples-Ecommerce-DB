<?php

namespace Modules\Payments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'valid_from',
        'valid_to',
        'usage_limit',
        'discount',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'valid_from' => 'datetime',
            'valid_to'   => 'datetime',
        ];
    }
}
