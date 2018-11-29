<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('categories')->with('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_categories()
    {    
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('list_categories')->with('categories', $categories);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts($id)
    {    
        $products = DB::table('categories')->join('products', function ($join) use ($id){ $join->on('categories.id', '=', 'products.id_category') ->where('categories.id', '=', $id); }) 
        ->get();
        //dd($products);
        return view('view_products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('create_category')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Category;
        $c->description = $request->description;
        $c->id_father = $request->id_father;
        if ($c->save()) {
          return redirect()->action('CategoryController@index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Category::find($id);
        return view('category')->with('category', $c);
    }

    /**
     * Show the form for editing the specified resource.
     *  In this case is used to update the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('edit_category')->with(['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        DB::table('categories')->where('id', $id)->update(['description' => $request->description, 'id_father' => $request->id_father]);
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('categories')->with('categories', $categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return response()->json(['code' => 200]);
    }

}
