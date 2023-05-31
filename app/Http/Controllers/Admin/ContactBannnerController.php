<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactBannerRequestForm;
use App\Models\ContactBanner;
use Image;

class ContactBannnerController extends Controller
{

    public function index()
    {
        $contactBanner = ContactBanner::first();

        return view('admin.banner.contact.form', compact('contactBanner'));

    }
    public function create()
    {

        
    }

    public function store(ContactBannerRequestForm $request)
    {
        $banner = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/contact/banner/'.$name_gen_one);
            Image::make($image)->resize(2300,1533)->save($location);
            $save = 'uploads/contact/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }

        toastr()->success('Data has been insert successfully!', 'Congrats');

        ContactBanner::create($banner);

        return redirect()
                ->route('contact-banner.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(ContactBanner $contactBanner)
    {
        return view('admin.banner.contact.form', compact('contactBanner'));
    }

    public function update(ContactBannerRequestForm $request, ContactBanner $contactBanner)
    {
        $banner = $request->validated();

        if ($request->image) {

            // if ($contactBanner->image) {
            //      unlink($contactBanner->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/contact/banner/'.$name_gen_one);
            Image::make($image)->resize(2300,1533)->save($location);
            $save = 'uploads/contact/banner/'.$name_gen_one;
            $banner['image'] = $save;

        }
        
        toastr()->success('Data has been update successfully!', 'Congrats');

        $contactBanner->update($banner);

        return redirect()
                ->route('contact-banner.index');
    }
}
