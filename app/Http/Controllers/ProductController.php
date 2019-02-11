<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Helpers\TreeHelper;

class ProductController extends Controller
{

    public function index(Product $product)
    {
        $products = Product::all();

        foreach ($products as $product)
        {
            //Список категорий для продукта
            $product->getCategoryName($product->id);
        }

        //Сортировка по категории
        $categoryId = 1;
        $products = $product->sortByCategory($categoryId);

        //Сортировка по флагу
        $products = $product->sortPopular(1);
        $products = $product->sortNew(1);





    }

 
    public function create()
    {
        // return view(/../);
    }


    public function store(Request $request)
    {
        // Product::create($request-all());

        //     Product::create([
        //     'name' => 'Test Category',
        //     /..../
        //    ]);
    }


    public function show($id)
    {
        $category = Product::find($id);
    }

    public function edit($id)
    {
        $post = Product::find($id);
        //.....
    }

    public function update(Request $request, $id)
    {
        $category = Product::find($id);
       // $category->update($request-all());
    }

    public function destroy($id)
    {
        $category = Product::find($id);
        $category->delete();
    }
}
