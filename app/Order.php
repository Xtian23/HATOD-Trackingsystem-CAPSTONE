<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderLine;
use App\Personnel;
use App\Customer;
use App\User;
use App\Facades\SMS;

class Order extends Model
{
    protected $fillable=[
        'customer_id',
        'order_date',
        'payment_method',
        'served_by',
        'delivered_by',
        'status'
    ];

    protected $appends = [
        'total'
    ];




    public function details()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function clerk()
    {
        return $this->belongsTo(User::class, 'served_by');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function deliveryPersonnel()
    {
        return $this->belongsTo(Personnel::class, 'delivered_by');
    }

    public function getTotalAttribute()
    {
        return $this->details->sum('subtotal');
    }

     public function notifyCustomer()
    {
        $message = new SMS($this->customer->contact_no, "Good Day Maam/Sir, Your order is now being Processed.H.A.T.O.D. Tracking System
            ");
        return $message->send();
    }

}
