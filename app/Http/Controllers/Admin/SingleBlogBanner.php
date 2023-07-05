<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SingleBlog;
use App\Http\Requests\SingleBlogBannerRequest;
use Image;

class SingleBlogBanner extends Controller
{
    public function index()
    {
        $singleBlog = SingleBlog::first();

        return view('admin.banner.blog.single-blog', compact('singleBlog'));

    }
    public function create()
    {

        
    }

    public function store(SingleBlogBannerRequest $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/blog/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,600)->save($location);
            $save = 'uploads/blog/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        SingleBlog::create($banner);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('single-blog.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(SingleBlog $singleBlog)
    {
        return view('admin.banner.blog.single-blog', compact('singleBlog'));
    }

    public function update(SingleBlogBannerRequest $request, SingleBlog $singleBlog)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($SingleBlogBanner->image) {
            //      unlink($SingleBlogBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/blog/banner/'.$name_gen_one);
            Image::make($image)->resize(2000,600)->save($location);
            $save = 'uploads/blog/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        $singleBlog->update($banner);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('single-blog.index');
    }
}
