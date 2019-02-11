<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Helpers\TreeHelper;

class CategoryController extends Controller
{
    use TreeHelper;

    public function index()
    {
        Category::all();
        // return view(/../);
    }
 
    public function create()
    {
        // return view(/../);
    }

    public function store(Request $request)
    {
        // Category::create($request-all());

           Category::create([
            'name' => 'Test Category',
            'slug' => 'test_categry',
            'status' => 0,
            'category_id' => 1
           ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
    }

    public function edit($id)
    {
        $post = Category::find($id);
        //.....
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
       // $category->update($request-all());
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function getTree()
    {
        $categories = Category::all();
        $treeList = $this->getTreeList($categories);
    }
    
}
