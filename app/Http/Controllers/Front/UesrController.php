<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UesrController extends Controller
{
  public function showUserName(){
      return 'amal mohammed';

  }

  public function getIndex(){
    //بكتب فيو واسم الفيو
   /* $data=[];
    $data['id']= 22;
    $data['name']='amal mohammed';

    //ممكن نعمل باس للداتا بشكل اخر
    
     $obj = new \stdClass();
     $obj ->name = 'amal';
    $obj ->id = '22';
    $obj ->gender = 'female';
    /////////// عشان نعمل فورايش بنعمله كومنت  return view('welcome')->with('name','amal mohammed');/*
    // foreach فيديو 26
      $data=['ahmed' ,  'baseem'];

 return view('welcome' , compact('data'));
*/
  }
}


