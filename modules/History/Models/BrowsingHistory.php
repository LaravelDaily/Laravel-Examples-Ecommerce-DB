<?php

namespace Modules\History\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Inventory\Models\Product;
use Modules\User\Models\User;

class BrowsingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'viewed_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function casts(): array
    {
        return [
            'viewed_at' => 'datetime',
        ];
    }
}
