<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class); //satu order memiliki satu payment method
    }
    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class); //satu order memiliki banyak order product
    }
}
