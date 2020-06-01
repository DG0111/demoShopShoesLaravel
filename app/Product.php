<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id','name','description','price','promotion_price','quantity','status','view_count'];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function image() {
        return $this->hasOne('App\Image', 'product_id','id');
    }
}
