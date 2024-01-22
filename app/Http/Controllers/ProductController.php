<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        //select * from products;
        $products = Product::all(); 

        return view('pages.index', ['products' => $products]);
    }

    public function show(Product $product) 
    {
        return view('pages.show', ['product' => $product]);
    }

    public function create()
    {
        //select * from users;
        $categories = Category::all();

        return view('pages.create', ['categories' => $categories]);
    }

    public function store(Request $request){
        //code to validate the data
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ],[
            'name.required' => 'Product name is required',
            'name.unique' => 'This name is taken by another product',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer number'
        ]);
       //get the category name
       $category_name = Category::find($request->category)->name;
       //save the product
       $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_name' => $category_name,
            'description' => $request->description
        ]);

        // Attach the selected category to the product
        $product->categories()->attach($request->input('category'));

        //3- redirection to pages.index
        return to_route('product.get_all');
    }


}
