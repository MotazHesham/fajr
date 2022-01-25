<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\News;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Subscription;
use App\Models\FajrCrew;
use App\Models\Policy;
use App\Models\Section;
use App\Models\Service;
use App\Models\Management;
use App\Models\Description;
use App\Models\SuccessPartner;
use Alert;

class HomeController
{
    public function home()
    {
        $setting = Setting::first();
        $news = News::orderBy('created_at','desc')->get()->take(3);
        $projects = Project::orderBy('created_at','desc')->paginate(6);
        $fajrCrews = FajrCrew::with(['types'])->first();
        $policies = Policy::with(['media'])->get()->take(4);
        $sections = Section::get()->take(10);
        $management = Management::get()->take(10);
        $descriptions = Description::with(['media'])->get()->take(4);
        $successPartners = SuccessPartner::with(['media'])->get()->take(5);
        $services = Service::with(['media'])->get();
        return view('frontend.home',compact('setting','news','projects','fajrCrews','policies','sections','management','descriptions','successPartners','services'));
    }

    public function subscription(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            
        ]);
    
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
