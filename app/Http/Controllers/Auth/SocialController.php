<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
      public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();

        $findUser=User::where('email',$user->getEmail())->first();

        if($findUser)
        {
          Auth::login($findUser);
        }

        else
        {

        $newUser=new User;

        $newUser->email=$user->getEmail();

        $newUser->name=$user->getName();

        $newUser->password=bcrypt(123456);

        $newUser->avatar=$user->getAvatar();

        $newUser->address='Kapan';

        $newUser->contact=9842819652;

        $newUser->role='customer';

        $newUser->email_verified_at= date('Y-m-d H:i:s'); 

        $newUser->social= $user->id;

        $newUser->save();

        Auth::login($newUser);

        }

        return redirect()->route('backend.customerDashboard');
        



    }
}
