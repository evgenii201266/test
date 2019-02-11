<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'new', 'status', 'popular', 'articul',
                           'img', 'description', 'additional_attributes'];

    public function category()
    {
        return $this->belongsTo(ProductCategoryId::class, 'id','product_id');
    }
    
    public function getCategoryName($id)
    {
        return Category::whereIn('id', $this->getCategoryId($id))->pluck('name');
    }

    public function sortByCategory($id)
    {
        return Product::whereHas('category', function($query) use($id) {
                            $query->where('category_id', $id);
                        })->get();
    }

    public function sortPopular($flagValue)
    {
        return $this->where('popular', $flagValue);
    }

    public function sortNew($flagValue)
    {
        return $this->where('new', $flagValue);
    }

    private function getCategoryId($id)
    {
        return $this->category()->where('product_id', $id)->pluck('category_id');
    }
}


