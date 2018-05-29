<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable=[
    	"unit"
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
