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
use App\Models\CrewType;
use App\Models\Certificate;
use Alert;
use App\Models\SaidAboutUs;

class HomeController
{
    public function home()
    {
        $setting = Setting::first();
        $news = News::orderBy('created_at','desc')->get();
        $projects = Project::orderBy('created_at','desc')->get();
        $crewTypes = CrewType::with(['media'])->get();
        $policies = Policy::with(['media'])->get()->take(4);
        $sections = Section::get()->take(10);
        $management = Management::get()->take(10);
        $descriptions = Description::with(['media'])->get()->take(4);
        $successPartners = SuccessPartner::with(['media'])->get()->take(5);
        $services = Service::with(['media'])->get();
        $sliders=Slider::orderBy('created_at','desc')->get();
        $saids=SaidAboutUs::get();
        return view('frontend.home',compact('setting','news','projects','policies','sections','management','descriptions','successPartners','services','sliders','saids','crewTypes'));
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

    public function about(){

        $setting = Setting::first();

        return view('frontend.about',compact('setting'));

    }
    public function vision(){

        $setting = Setting::first();

        return view('frontend.vision',compact('setting'));
    }
    public function department(){

         $sections = Section::get();
        return view('frontend.department',compact('sections'));
    }
    public function tasks(){
        $descriptions = Description::with(['media'])->get();
       return view('frontend.tasks',compact('descriptions'));
    }
   public function policies(){

    $policies = Policy::with(['media'])->get();

   return view('frontend.policies',compact('policies'));
   }

   public function crew(){

      $crews=FajrCrew::with(['types', 'media'])->paginate(12);

      return view('frontend.crew',compact('crews'));
   }
   public function certificate(){

   $certificates=Certificate::with(['media'])->paginate(12);

   return view('frontend.certificates',compact('certificates'));

   }

}


