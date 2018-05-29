<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable=[
    	"vehicletype"
    ];

    use SoftDeletes;
   	protected $dates = ['deleted_at'];
}
