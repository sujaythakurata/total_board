<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productdetails extends Model
{
    protected $table = "product_list";

   ///get product list
    public function scopegetlist($query)
    {
    	$query->select(['product_id','product_name']);
    }

    ///get data product wise
    public function scopegetbottel($query, $id)
    {
    	$query
    	->select(["no_of_bottle"])
    	->where('product_id', $id);
    }

    //add new product 
    public function scopeaddproduct($query, $name, $bottle, $liter)
    {
        $query
        ->insert([
            "product_name"=>$name,
            "no_of_bottle"=>$bottle,
            "liters"=>$liter
        ]);
    }
}
