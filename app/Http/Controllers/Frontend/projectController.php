<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;

class projectController extends Controller
{
    //
    public function index(){

    $projects=Project::paginate('12');
    $services=Service::get();
    return view('frontend.projects',compact('projects','services'));

    }
    public function show($id){

        $project=Project::findOrfail($id);
    
        return view('frontend.project_details',compact('project'));
    
        }

    }
