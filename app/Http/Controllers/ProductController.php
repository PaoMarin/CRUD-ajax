<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
        return view('products')->with('products', $products);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('create_product')->with(['products' => $products, 'categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Storage::putFile('image', new File('/path/public/image'));
        $c = new Product;
        $c->sku = $request->sku;
        $c->name = $request->name;
        $c->description = $request->description;
        $c->image = $request->image;
        $c->id_category = $request->id_category;
        $c->stock = $request->stock;
        $c->price = $request->price;

        if ($c->save()) {
          return redirect()->action('ProductController@index');
        }
    }

    public function edit($id){
        $product = Product::find($id);
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('edit_product')->with(['product' => $product, 'products' => $products, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        DB::table('products')->where('id', $id)->update(['sku' => $request->sku, 'name' => $request->name, 'description' => $request->description, 'image' => $request->image, 'id_category' => $request->id_category, 'stock' => $request->stock, 'price' => $request->price]);
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
        return view('products')->with('products', $products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return response()->json(['code' => 200]);
    }
}


