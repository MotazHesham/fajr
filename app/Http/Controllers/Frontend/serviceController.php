<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    //
    public function index(){
      
         $services=Service::paginate(8);

         return view('frontend.service',compact('services'));

    }

    public function show($id){
      
        $service=Service::findOrfail($id)->with('serviceFaQs');
        $services=Service::get();
        
        return view('frontend.service_details',compact('service','services'));

   }
}
