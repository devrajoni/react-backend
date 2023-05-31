<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogBannerRequestForm;
use App\Models\BlogBanner;
use Image;

class BlogBannerController extends Controller
{

    public function index()
    {
        $blogBanner = BlogBanner::first();

        return view('admin.banner.blog.form', compact('blogBanner'));

    }
    public function create()
    {

        
    }

    public function store(BlogBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/blog/banner/'.$name_gen_one);
            Image::make($image)->resize(2300,1366)->save($location);
            $save = 'uploads/blog/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        BlogBanner::create($banner);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('blog-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(BlogBanner $blogBanner)
    {
        return view('admin.banner.blog.form', compact('blogBanner'));
    }

    public function update(BlogBannerRequestForm $request, BlogBanner $blogBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($blogBanner->image) {
            //      unlink($blogBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/blog/banner/'.$name_gen_one);
            Image::make($image)->resize(2300,1366)->save($location);
            $save = 'uploads/blog/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        $blogBanner->update($banner);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('blog-banner.index');
    }
}
