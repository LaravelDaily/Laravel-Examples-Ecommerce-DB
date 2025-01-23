<?php

namespace Modules\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'amount',
        'payment_date',
        'payment_method',
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    protected function casts(): array
    {
        return [
            'payment_date' => 'datetime',
        ];
    }
}
