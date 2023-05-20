<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutBannerRequestForm;
use App\Models\AboutBanner;
use Image;

class AboutBannerController extends Controller
{

    public function index()
    {
        $aboutBanner = AboutBanner::first();

        return view('admin.banner.about.form', compact('aboutBanner'));

    }
    public function create()
    {

        
    }

    public function store(AboutBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,1331)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been insert successfully!', 'Congrats');

        AboutBanner::create($banner);

        return redirect()
                ->route('about-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(AboutBanner $aboutBanner)
    {
        return view('admin.banner.about.form', compact('aboutBanner'));
    }

    public function update(AboutBannerRequestForm $request, AboutBanner $aboutBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            if ($aboutBanner->image) {
                 unlink($aboutBanner->image);
            }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,1331)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been updated successfully!', 'Congrats');

        $aboutBanner->update($banner);

        return redirect()
                ->route('about-banner.index');
    }
}
