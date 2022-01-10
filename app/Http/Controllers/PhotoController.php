<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;

use App\Models\Product;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Schema;



class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo=Photo::all();

        return view('backend.pages.product_image_table',compact('photo'))->with('no',1);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productDetails=Product::where('inserted_by',auth()->user()->id)
                        ->get();  

        return view('backend.pages.add_product_image',compact('productDetails'));
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

        'product_id'=>'required',
        
        'photo'=>'required',

        'photo.*' => 'image'    

        ],[

         'image'=>'Photo must be an image file'   

        ]);

        foreach($request->file('photo') as $rows)
        { 

        $originalName=$rows->getClientOriginalName();

        Photo::create([

        'product_id'=>$request->product_id,
        
        'photo'=>$originalName, 

        ]);

        $rows->storeAs('productimages',$originalName,'public');

        }

        $this->displayMessage('Product Image Inserted Successfully','alert alert-success');

        return redirect()->route('photos.index');


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
    public function edit(Photo $photo)
    {
        return view('backend.pages.edit_product_image',compact('photo'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $this->validate($request,[

        'photo'=>['required','image']    

        ]);

        if($photo->photo)
        {
            Storage::disk('public')->delete('productimages/'.$photo->photo);
        }

        $originalName=$request->file('photo')->getClientOriginalName();

        $request->file('photo')->storeAs('productimages',$originalName,'public');

        $photo->update([

         'photo'=>$originalName   

        ]);

          $this->displayMessage('Product Image Updated Successfully','alert alert-success');

        return redirect()->route('photos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if($photo->photo)
        {
            Storage::disk('public')->delete('productimages/'.$photo->photo);
        }

        $photo->delete();

        $this->displayMessage('Image Deleted Successfully','alert alert-danger');

        return redirect()->route('photos.index');


    }

    public function __construct()
    {
        $this->middleware(['auth','access-middleware','verified'])->only('index','edit');
    }
}
