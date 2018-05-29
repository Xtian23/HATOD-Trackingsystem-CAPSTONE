<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderLine extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price'
    ];

    protected $appends = [
        'subtotal'
    ];

    protected $casts = [
        'quantity' => 'float', 
        'unit_price' => 'float', 
    ];

    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
