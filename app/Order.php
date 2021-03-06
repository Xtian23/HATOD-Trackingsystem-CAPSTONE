<?php

namespace App;

use App\Customer;
use App\Facades\SMS;
use App\OrderLine;
use App\Personnel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'order_date',
        'payment_method',
        'served_by',
        'delivered_by',
        'status',
        'datetime_received',
    ];

    protected $dates = [
        'datetime_received',
    ];

    protected $appends = [
        'total',
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

    public function notifyCustomer($orderStatus = 'PROCESSED')
    {
        $message = new SMS($this->customer->contact_no, "Good Day Maam/Sir, Your order is now being {$orderStatus} .H.A.T.O.D. Tracking System
            ");
        return $message->send();
    }

    public function scopeUndelivered($query, $deliveryPersonnelId = false)
    {
        return $query->whereNotIn('status', ['received', 'pending'])
            ->orderBy('id', 'asc')
            ->when($deliveryPersonnelId, function ($q) use ($deliveryPersonnelId) {
                $q->whereDeliveredBy($deliveryPersonnelId);
            });
    }

    public function set($orderStatus)
    {
        $columns = [
            'status' => $orderStatus,
        ];

        if ($orderStatus === 'received') {
            $columns['datetime_received'] = now();
        }

        if ($orderStatus === 'delivered') {
            $this->notifyCustomer('DELIVERED');
        }

        return $this->update($columns);
    }

}
