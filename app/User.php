<?php

namespace App;

use App\Personnel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        "username", "fname", "lname", "birthdate", "password", "password_confirmation", "address", "email_add", "contact_no", "usertype", "title", "userimage", "name",
    ];

    protected $appends = [
        "age",
        'fullname',
        'image_path',
    ];

    public function getAgeAttribute()
    {

        return Carbon::createFromFormat('Y-m-d', $this->birthdate, 'Asia/Manila')->diffInYears(Carbon::now('Asia/Manila'));
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getFullnameAttribute()
    {
        return "{$this->fname} {$this->lname}";
    }

    public function getImagePathAttribute()
    {
        return asset("uploads/{$this->userimage}");
    }

    public function personnel()
    {
        return $this->hasOne(Personnel::class, 'user_id');
    }

    public function scopeWithPersonnelId($query)
    {
        return $query->addSelect('p.id AS personnel_id')
            ->join('personnels AS p', 'p.user_id', '=', 'users.id');
    }
}
