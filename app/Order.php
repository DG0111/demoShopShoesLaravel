<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','product_id','amount','number_phone','first_name','last_name','country','address','email','date'];
}
