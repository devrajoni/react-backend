<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HomeBannerRequestForm;
use App\Models\HomeBanner;
use Image;

class HomeBannerController extends Controller
{
    public function index()
    {
        $homeBanner = HomeBanner::first();

        return view('admin.banner.home.form', compact('homeBanner'));

    }
    public function create()
    {

        
    }

    public function store(HomeBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/home/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/home/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        HomeBanner::create($banner);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('home-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(HomeBanner $homeBanner)
    {
        return view('admin.banner.home.form', compact('homeBanner'));
    }

    public function update(HomeBannerRequestForm $request, HomeBanner $homeBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($homeBanner->image) {
            //      unlink($homeBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/home/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/home/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        $homeBanner->update($banner);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('home-banner.index');
                
    }
}
