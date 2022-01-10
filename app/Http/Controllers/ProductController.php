<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role=='admin')

        $productDetails=Product::all();
        else
        $productDetails=Product::where('inserted_by',auth()->user()->id)
                                  ->get();
        return view('backend.pages.product_table',compact('productDetails'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=Product::create([

        'name'=>$request->name,
        
        'type'=>$request->type,

        'brand'=>$request->brand,

        'price'=>$request->price,

        'inserted_by'=>auth()->user()->id

        ]);

        foreach($request->file('photo') as $rows)
        { 

        $originalName=$rows->getClientOriginalName();

        Photo::create([

        'product_id'=>$product->id,
        
        'photo'=>$originalName, 


        ]);

        $rows->storeAs('productimages',$originalName,'public');

        }

        $this->displayMessage('Product Inserted Successfully','alert alert-success');

        return redirect()->route('products.index');

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
    public function edit(Product $product)
    {
        return view('backend.pages.edit_product',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[

          'name'=>['required'],
          'type'=>['required'],
          'brand'=>['required'],
          'price'=>['required'], 

        ]);

        $product=Product::where('id',$product->id)
                          ->update([
                           'name'=>$request->name,
                           'type'=>$request->type,
                           'brand'=>$request->brand,
                           'price'=>$request->price 

                          ]);

        
        $this->displayMessage('Product Updated Successfully','alert alert-success');
        return redirect()->route('products.index');                  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

       $this->displayMessage('Product Removed Successfully','alert alert-danger');
        return redirect()->route('products.index');


    }

    public function __construct()
    {
        $this->middleware(['auth','access-middleware','verified'])->only('index','create','edit');

    }


   

}
