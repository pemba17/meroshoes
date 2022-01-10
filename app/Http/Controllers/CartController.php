<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use DB;

class CartController extends Controller
{
   public function storeCart(Request $request)
   {

        $this->validate($request,[

          'quantity'=>'required|numeric|min:1'

        ]);

        $details=DB::table('products')
                    ->rightjoin('photos','products.id','=','photos.product_id')
                    ->rightjoin('carts','photos.id','=','carts.photo_id')
                    ->where('carts.cart_by',auth()->user()->id)
                    ->get();

        $mainD=$details->toArray();            

        $productId=array_column($mainD, 'product_id');

        if(in_array($request->product_id,$productId))
        {
        
            $row=Cart::where('photo_id',$request->photo_id)
                  ->first();        

            Cart::where('photo_id',$request->photo_id)

                  ->update([

                    'quantity'=>$request->quantity+$row->quantity

                  ]);

            $this->displayMessage('Cart Added Successfully','alert alert-success');

            return redirect()->route('front.cart');
            
            exit();      
          
        }

        Cart::create([

         'photo_id'=>$request->photo_id,

         'cart_by'=>auth()->user()->id,

         'quantity'=>$request->quantity  

        ]);

        $this->displayMessage('Cart Added Successfully','alert alert-success');

        return redirect()->route('front.cart');
   }

   public function cart()
   {
       $details=DB::table('products')
                    ->rightjoin('photos','products.id','=','photos.product_id')
                    ->rightjoin('carts','photos.id','=','carts.photo_id')
                    ->where('carts.cart_by',auth()->user()->id)
                    ->get();               

       return view('frontend.pages.cart',compact('details'))->with('no',0);

   }

   public function updateCart(Request $request, Cart $cart)

   {

       $this->validate($request,[

          'quantity'=>'required|numeric|min:1'

        ]);
       
      $cart->update([

      'quantity'=>$request->quantity  

      ]);

      $this->displayMessage('Cart Updated Successfully','alert alert-success');

      return redirect()->route('front.cart');
   }


   public function deleteCart($number)

   {
        Cart::destroy($number);

        $this->displayMessage('Cart Deleted Successfully','alert alert-danger');

        return redirect()->route('front.cart');
   }


}
