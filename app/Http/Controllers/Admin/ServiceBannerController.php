<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceBannerRequestForm;
use App\Models\ServiceBanner;
use Image;

class ServiceBannerController extends Controller
{
    public function index()
    {
        $serviceBanner = ServiceBanner::first();

        return view('admin.banner.service.form', compact('serviceBanner'));

    }
    public function create()
    {

        
    }

    public function store(ServiceBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/service/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,1333)->save($location);
            $save = 'uploads/service/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been insert successfully!', 'Congrats');

        ServiceBanner::create($banner);

        return redirect()
                ->route('service-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(ServiceBanner $serviceBanner)
    {
        return view('admin.banner.service.form', compact('serviceBanner'));
    }

    public function update(ServiceBannerRequestForm $request, ServiceBanner $serviceBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            if ($serviceBanner->image) {
                 unlink($serviceBanner->image);
            }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/service/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,1333)->save($location);
            $save = 'uploads/service/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        toastr()->success('Data has been update successfully!', 'Congrats');

        $serviceBanner->update($banner);

        return redirect()
                ->route('service-banner.index');
    }
}
