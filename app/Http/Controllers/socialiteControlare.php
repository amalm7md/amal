<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class socialiteControlare extends Controller
{
    public function redirect($service){
       return socialite::driver($service) ->redirect();
 
    }
    public function callback($service,Request $request)
    {
             /*  $user = Socialite::driver($service) ->stateless()-> user() ;
              return response() -> json($user);*/
              return   $user = Socialite::with($service)-> user() ;
    }
}
