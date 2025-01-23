<?php

namespace Modules\Orders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Shipping\Models\OrderReturn;

class OrderRefund extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_return_id',
        'amount',
        'status',
        'processed_at',
    ];

    public function orderReturn(): BelongsTo
    {
        return $this->belongsTo(OrderReturn::class);
    }

    protected function casts(): array
    {
        return [
            'processed_at' => 'datetime',
        ];
    }
}
