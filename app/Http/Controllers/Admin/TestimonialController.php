<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequestForm;
use App\Models\Testimonial;
use Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonial.testimonial.index', compact('testimonials'));

    }
    
    public function create()
    {
        return view('admin.testimonial.testimonial.form');  
    }

    public function store(TestimonialRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/testimonial/'.$name_gen_one);
            Image::make($image)->resize(128,128)->save($location);
            $save = 'uploads/testimonial/'.$name_gen_one;
            $data['image'] = $save;

        }

        Testimonial::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('testimonial.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.testimonial.form', compact('testimonial'));
    }

    public function update(TestimonialRequestForm $request, Testimonial $testimonial)
    {
        $data = $request->validated();

        if ($request->image) {

            // if ($testimonial->image) {
            //      unlink($testimonial->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/testimonial/'.$name_gen_one);
            Image::make($image)->resize(128,128)->save($location);
            $save = 'uploads/testimonial/'.$name_gen_one;
            $data['image'] = $save;

        }
        
        $testimonial->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('testimonial.index');
                
    }
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('testimonial.index');

    }

    public function status($id)
    {
        $data = Testimonial::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Testimonial::where('id', $id)->update(['status' => $status]);

        return redirect()->route('testimonial.index');

    }
}
