<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    protected $fillable = [
        "personnel_fname", "personnel_lname", "address", "birthdate", "contact_no", "personnel_type", "usertype", "color", 'user_id', 'color',
    ];

    protected $appends = [
        "fullname", "age",
    ];

    public function getFullnameAttribute()
    {

        return "{$this->personnel_fname} {$this->personnel_lname}";
    }

    public function getAgeAttribute()
    {

        return Carbon::createFromFormat('Y-m-d', $this->birthdate, 'Asia/Manila')->diffInYears(Carbon::now('Asia/Manila'));
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeDriver($query)
    {
        return $query->whereNotNull('user_id');
    }
}
