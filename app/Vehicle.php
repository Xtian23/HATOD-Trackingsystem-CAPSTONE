<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    
    protected $fillable=[
    	"license_plate","vehicletype","made","delivery_personnel"
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
