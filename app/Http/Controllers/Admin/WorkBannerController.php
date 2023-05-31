<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkBannerRequestForm;
use App\Models\WorkBanner;
use Image;

class WorkBannerController extends Controller
{
    public function index()
    {
        $workBanner = WorkBanner::first();

        return view('admin.banner.work.form', compact('workBanner'));

    }
    public function create()
    {

        
    }

    public function store(WorkBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/work/banner/'.$name_gen_one);
            Image::make($image)->resize(2500,1166)->save($location);
            $save = 'uploads/work/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been insert successfully!', 'Congrats');

        WorkBanner::create($banner);

        return redirect()
                ->route('work-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(WorkBanner $workBanner)
    {
        return view('admin.banner.work.form', compact('workBanner'));
    }

    public function update(WorkBannerRequestForm $request, WorkBanner $workBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($workBanner->image) {
            //      unlink($workBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/work/banner/'.$name_gen_one);
            Image::make($image)->resize(2500,1166)->save($location);
            $save = 'uploads/work/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        toastr()->success('Data has been update successfully!', 'Congrats');

        $workBanner->update($banner);

        return redirect()
                ->route('work-banner.index');
    }
}
