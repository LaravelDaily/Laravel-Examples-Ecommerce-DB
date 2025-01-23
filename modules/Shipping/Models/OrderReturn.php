<?php

namespace Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Orders\Models\OrderItem;

class OrderReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_item_id',
        'reason',
        'status',
    ];

    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }
}
