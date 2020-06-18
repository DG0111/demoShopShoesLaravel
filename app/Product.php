<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = ['category_id', 'name', 'description', 'price', 'promotion_price', 'quantity', 'status', 'view_count'];
    public $timestamps = true;


    public function categories()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function sizes()
    {
        return $this->hasMany('App\size', 'product_id', 'id');
    }

    protected static function destroyImageSize()
        {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
            $product->images()->delete();
            $product->sizes()->delete();
            // do the rest of the cleanup...
        });
    }


    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
