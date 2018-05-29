<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Personnel extends Model
{
  protected $fillable=[
    "personnel_fname","personnel_lname","address","birthdate","contact_no","personnel_type","usertype","color"
    ];


    protected $appends=[
    	"fullname","age"
    ];

    public function getFullnameAttribute()
    {
    
	return "{$this->personnel_fname} {$this->personnel_lname}";
    }

      public function getAgeAttribute()
    {
    
    return Carbon::createFromFormat('Y-m-d',$this->birthdate,'Asia/Manila')->diffInYears(Carbon::now('Asia/Manila'));
    }

    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
