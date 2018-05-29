<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    protected $fillable=[
    	"customer_fname","customer_lname","address","birthdate","contact_no","email_add"
    ];

    protected $appends=[
    	"fullname","age"
    ];
    public function getFullnameAttribute()
    {

    	return "{$this->customer_fname} {$this->customer_lname}";
    	# code...
    }


    public function getAgeAttribute()
    {
    
    return Carbon::createFromFormat('Y-m-d',$this->birthdate,'Asia/Manila')->diffInYears(Carbon::now('Asia/Manila'));
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}

