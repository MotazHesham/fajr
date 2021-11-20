<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\News;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Subscription;
use Alert;

class HomeController
{
    public function home()
    {
        $setting = Setting::first();
        $news = News::orderBy('created_at','desc')->get()->take(3);
        $projects = Project::orderBy('created_at','desc')->get()->take(3);
        return view('frontend.home',compact('setting','news','projects'));
    }

    public function subscription(Request $request)
    {
        $subscription = Subscription::where('email',$request->email)->first();

        if($subscription){
            Alert::warning('لم يتم الأشتراك','تم الأشتراك من قبل');
        }else{
            $subscription = Subscription::create($request->all());
            Alert::success('تم الأشتراك بنجاح','سنوافيك بكل الأخبار الجديدة');
        }

        return back();
    }
}
