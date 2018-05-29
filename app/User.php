<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    protected $fillable=[
    	"username","fname","lname","birthdate","password","password_confirmation","address","email_add","contact_no","usertype"
    ];

     protected $appends=[
    	"age"
    ];

    public function getAgeAttribute()
    {
    
	return Carbon::createFromFormat('Y-m-d',$this->birthdate,'Asia/Manila')->diffInYears(Carbon::now('Asia/Manila'));
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
