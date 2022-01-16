<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = product::all();

        $categories = Category::all();
        $products = product::with(['user'])->get();

        $latest_products = product::with(['user'])->latest('id')->take(3)->get();
        $blogs = Blog::all();
        $banners = Banner::all();

        return view('product.index',compact('products','categories','latest_products','blogs','banners')); //odev kısmı

        //$products = product::with(['user'])->simplePaginate(2);
        //return view('urunler',compact('products','categories'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $created_by = User::find(1);

        Product::create([
            'name' => $name,
            'price' => $price,
            'created_by' => $created_by->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export(){
        return Excel::download(new ProductExport,'products.xlsx');
    }
}
