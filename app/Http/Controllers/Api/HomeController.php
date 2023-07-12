<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\ServiceBanner;
use App\Models\SingleServiceBanner;
use App\Models\AboutBanner;
use App\Models\WorkBanner;
use App\Models\BlogBanner;
use App\Models\ContactBanner;
use App\Models\Service;
use App\Models\About;
use App\Models\Testimonial;
use App\Models\Latest;
use App\Models\Social;
use App\Models\Setting;
use App\Models\Team;
use App\Models\AllWork;
use App\Models\AboutGallery;
use App\Models\ServiceWork;
use App\Models\WorkGallery;
use App\Models\AboutCard;
use App\Models\AboutSkill;
use App\Models\AboutBusiness;
use App\Models\SimilarProject;
use App\Models\Feature;
use App\Models\ContactCard;
use App\Models\WorkCategory;
use App\Models\SingleBlog;
use Image;
use File;

class HomeController extends Controller
{
    public function home()
    {
        $data = HomeBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function service()
    {
        $data = ServiceBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function singleServices()
    {
        $data = SingleServiceBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function about()
    {
        $data = AboutBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function work()
    {
        $data = WorkBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function blog()
    {
        $data = BlogBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function contact()
    {
        $data = ContactBanner::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function singleBlog()
    {
        $data = SingleBlog::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function services()
    {
        $data = Service::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function serviceOne($id)
    {
        $data = Service::where('status', 'Active')->with('feature')->with('skill')->where('id', $id)->get();
        $services = Service::get();

        return response()->json([
            'data' => $data,
            'services' => $services,
            'success' => true,
        ],201);
    }

    public function blogDetails($id)
    {
        $data = Latest::where('id', $id)->first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function abouts()
    {
        $data = About::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function testimonial()
    {
        $data = Testimonial::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function latest()
    {
        $data = Latest::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function team()
    {
        $data = Team::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function works()
    {
        $data = AllWork::where('status', 'Active')->with('category')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function singleWork($id)
    {
        $data = AllWork::where('status', 'Active')->with('category')->where('id', $id)->first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function social()
    {
        $data = Social::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function setting()
    {
        $result = Setting::first();

        return response()->json([
            'data' => $result,
            'success' => true,
        ],201);
    }

    public function workGallery()
    {
        $data = WorkGallery::get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function workCategory()
    {
        $data = WorkCategory::all();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function aboutGallery()
    {
        $data = AboutGallery::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function serviceWork()
    {
        $data = ServiceWork::get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function aboutCard()
    {
        $data = AboutCard::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function aboutSkill()
    {
        $data = AboutSkill::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function aboutBusiness()
    {
        $data = AboutBusiness::first();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function similarProject()
    {
        $data = SimilarProject::take(5)->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function feature()
    {
        $data = Feature::where('id', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function contacts()
    {
        $data = ContactCard::where('status', 'Active')->get();

        return response()->json([
            'data' => $data,
            'success' => true,
        ],201);
    }

    public function test(Request $request)
    {
        $test = null;
        $request->validate([
            'name' => [
                'required',
                'max:255',
            ],
            'designation' => [
                'required',
                'max:255',
            ],
            'rating' => [
                'required',
            ],
            'image' => [
                'nullable',
            ],
            'description' => [
                'required',
            ],
        ]);

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "testimonial". time() . '.' . $image->extension();
            $location = public_path('uploads/testimonial/'.$name_gen_one);
            Image::make($image)->resize(80,80)->save($location);
            $save = 'uploads/testimonial/'.$name_gen_one;
            $test = $save;

        }
        // dd($test['image'] );

        $data = Testimonial::create([
            'latest_id' => $request->latest_id,
            'name' => $request->name,
            'designation' => $request->designation,
            'rating' => $request->rating,
            'image' => $test,
            'description' => $request->description,
        ]);

        return response()->JSON([
            'data' => $data,
            'success' => true,
        ], 201);
    }
}
