<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\AttractionInfo;
use App\Language;
class AddAttractionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function view(){
        return view("addAttraction");
    }

    public function submit(Request $request){

        $user = $request->user();


        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = $request->name.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('img'), $imageName);



        $attraction = new Attraction;

        
        $attraction->latitude = $request->latitude;
        $attraction->longitude = $request->longitude;
        $attraction->cover_image = $imageName;
        $attraction->save();
        
        foreach(Language::get() as $i => $lang){    
            $attractionInfo = new AttractionInfo;

            $attractionInfo->attraction_id = $attraction->id;
            $attractionInfo->language_id = $lang->id;

            $attractionInfo->name = $request->input('name'.$lang->code);
            $attractionInfo->description = $request->input('description'.$lang->code);
        
            $attractionInfo->save();
        }
        return redirect()->back()->withSuccess('Attrazione aggiunta correttamente!');
    }
}
