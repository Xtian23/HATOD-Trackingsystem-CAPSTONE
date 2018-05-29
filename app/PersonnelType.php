<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonnelType extends Model
{
    protected $fillable=[
    	"personneltype"
    ];


    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
