<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SingleServiceBannerRequestForm;
use App\Models\SingleServiceBanner;
use Image;

class SingleServiceBannerController extends Controller
{
    public function index()
    {
        $singleServiceBanner = SingleServiceBanner::first();

        return view('admin.banner.single-service.form', compact('singleServiceBanner'));

    }
    public function create()
    {

        
    }

    public function store(SingleServiceBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "service-banner". time() . '.' . $image->extension();
            $location = public_path('uploads/service/banner/'.$name_gen_one);
            Image::make($image)->resize(2500,1754)->save($location);
            $save = 'uploads/service/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been insert successfully!', 'Congrats');

        SingleServiceBanner::create($banner);

        return redirect()
                ->route('single-service-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(SingleServiceBanner $singleServiceBanner)
    {
        return view('admin.banner.single-service.form', compact('singleServiceBanner'));
    }

    public function update(SingleServiceBannerRequestForm $request, SingleServiceBanner $singleServiceBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($singleServiceBanner->image) {
            //      unlink($singleServiceBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "service-banner". time() . '.' . $image->extension();
            $location = public_path('uploads/service/banner/'.$name_gen_one);
            Image::make($image)->resize(2500,1754)->save($location);
            $save = 'uploads/service/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        toastr()->success('Data has been update successfully!', 'Congrats');

        $singleServiceBanner->update($banner);

        return redirect()
                ->route('single-service-banner.index');
    }
}
