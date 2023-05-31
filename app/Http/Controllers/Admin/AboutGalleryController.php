<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutGalleryRequestForm;
use App\Models\AboutGallery;
use Image;

class AboutGalleryController extends Controller
{
    public function index()
    {
        $aboutGallery = AboutGallery::first();

        return view('admin.about.gallery.form', compact('aboutGallery'));

    }
    public function create()
    {

        
    }

    public function store(AboutGalleryRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image_one) {
            $image = $request->file('image_one');
            $name_gen_one = "gallery_one". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_one'] = $save;

        }
        if ($request->image_two) {
            $image = $request->file('image_two');
            $name_gen_one = "gallery_two". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_two'] = $save;

        }
        if ($request->image_three) {
            $image = $request->file('image_three');
            $name_gen_one = "gallery_three". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_three'] = $save;

        }

        AboutGallery::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('about-gallery.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(AboutGallery $aboutGallery)
    {
        return view('admin.about.gallery.form', compact('aboutGallery'));
    }

    public function update(AboutGalleryRequestForm $request, AboutGallery $aboutGallery)
    {
        $data = $request->validated();

        if ($request->image_one) {

            // if ($aboutGallery->image_one) {
            //      unlink($aboutGallery->image_one);
            // }
            $image = $request->file('image_one');
            $name_gen_one = "gallery_one". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_one'] = $save;

        }

        if ($request->image_two) {

            // if ($aboutGallery->image_two) {
            //      unlink($aboutGallery->image_two);
            // }
            $image = $request->file('image_two');
            $name_gen_one = "gallery_two". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_two'] = $save;

        }

        if ($request->image_three) {

            // if ($aboutGallery->image_three) {
            //      unlink($aboutGallery->image_three);
            // }
            $image = $request->file('image_three');
            $name_gen_one = "gallery_three". time() . '.' . $image->extension();
            $location = public_path('uploads/about/banner/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save = 'uploads/about/banner/'.$name_gen_one;
            $data['image_three'] = $save;

        }
        
        $aboutGallery->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('about-gallery.index');
                
    }
}
