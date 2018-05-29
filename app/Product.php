<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=[
    	"name","itemimage","itemname","unit","unitprice","item_description"
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
