<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $userDetails=User::find($id);

        return view('backend.pages.user_profile',compact('userDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[

        'name'=>'required',
        'address'=>'required',
        'contact'=>'required', 
        ]);

        if(empty($_FILES['avatar']['name']))
        {
            $user->update(['avatar'=>$user->avatar]);
        }

        else

        {

         $this->validate($request,[
         
         'avatar'=>'image'

         ]);   

        $originalName=$request->file('avatar')->getClientOriginalName();

        if($user->avatar)
        {
            Storage::disk('public')->delete('userimages/'.$user->avatar);
        }

        $user->update(['avatar'=>$originalName]);

        $request->file('avatar')->storeAs('userimages',$originalName,'public');      
        }

        $user->update([

        'name'=>$request->name,
        
        'address'=>$request->address,

        'contact'=>$request->contact,    

        ]);

        $this->displayMessage('Profile Updated Successfully','alert alert-success');

        return redirect()->route('users.edit',[$user->id]);


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
