<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    //

    public function index(){

        $news = News::orderBy('created_at','desc')->paginate(4);

        return view('frontend.news',compact('news'));
    }

    public function show($id){
        
        $new=News::findOrfail($id);

        $news = News::orderBy('updated_at','desc')->get()->take(3);

        return view('frontend.new_details',compact('news','new'));
    }
}
