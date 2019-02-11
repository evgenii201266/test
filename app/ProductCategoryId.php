<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryId extends Model
{
    protected $table = 'category_product_id';

    protected $fillable = ['catalog_id', 'product_id'];


}


