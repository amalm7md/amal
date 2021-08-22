<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Scopes\OfferScope;
use App\Traits\OfferTrait;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;
use Illuminate\Http\Request;


class CrudController extends Controller
{

    public function __construct()
    {

    }

    public function getOffers()
    {
        return Offer::select('id', 'name')->get();
    }

//حتوخد اشياء ستاتيك 
 /*public function store()
     {
         Offer::create([
             'name' => 'Offer3',
             'price' => '5000',
             'details' => 'offer details',
         ]);
     }
*/


public function create()
{
    return view('offers.create');
}

public function store(Request $request)
{
    //validate data before insert to database
    $rules = $this->getRules();
    $messages = $this->getMessages();
    $validator = Validator::make($request->all() ,$rules, $messages);
    if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInputs($request->all());
     }


  //  $file_name = $this->saveImage($request->photo, 'images/offers');

    //insert
    Offer::create([
        'photo' => $file_name,
        'name' => $request->name,
        'price' =>  $request->price,
        'details' => $request->details,
    ]);

    return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح ']);
}
    protected function getMessages()
    {
        return $messages = [
            'name.required' => __('messages.offer name required'),
            'name.unique' => 'اسم العرض موجود ',
            'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
            'price.required' => __('messages.offer price required'),
            'details.required' =>  __('messages.offer  details required'),
        ];
    }
    protected function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];}}

