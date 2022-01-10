<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bill;

use App\Models\Checkout;

use App\Models\Cart;

use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=DB::table('products')
                    ->rightjoin('photos','products.id','=','photos.product_id')
                    ->rightjoin('carts','photos.id','=','carts.photo_id')
                    ->where('carts.cart_by',auth()->user()->id)
                    ->get();               

       return view('frontend.pages.checkout',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
        'firstname'=>'required',
        'first_address'=>'required',
        'city'=>'required',
        'state'=>'required',
        'zip'=>'required',
        'user_email'=>'required|email',
        'user_phone'=>'required|numeric',
        'final_cost'=>'required|gt:0'    

        ]);

        $bill=Bill::create([

        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'company_name'=>$request->company_name,
        'first_address'=>$request->first_address,
        'second_address'=>$request->second_address,
        'city'=>$request->city,
        'state'=>$request->state,
        'zip'=>$request->zip,
        'user_email'=>$request->user_email,
        'user_phone'=>$request->user_phone,
        'final_cost'=>$request->final_cost    

        ]);


        foreach($request->product_id as $key=>$row)
        {
            $data=[

            array('product_id'=>$request->product_id[$key],'user_id'=>$request->user_id[$key],'photo_id'=>$request->photo_id[$key],'product_quantity'=>$request->product_quantity[$key],'bill_id'=>$bill->id)    
            ];

            Checkout::insert($data);

        }

        foreach($request->cart_id as $key=>$data)
        {
            Cart::destroy($request->cart_id[$key]);
        }

        return redirect()->route('ordercomplete');




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
}
