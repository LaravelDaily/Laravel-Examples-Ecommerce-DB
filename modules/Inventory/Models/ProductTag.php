<?php

namespace Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
