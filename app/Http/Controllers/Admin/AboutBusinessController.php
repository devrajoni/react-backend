<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutBusinessRequestForm;
use App\Models\AboutBusiness;
use Image;

class AboutBusinessController extends Controller
{
    public function index()
    {
        $aboutBusiness = AboutBusiness::first();

        return view('admin.about.business.form', compact('aboutBusiness'));

    }
    public function create()
    {

        
    }

    public function store(AboutBusinessRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "business". time() . '.' . $image->extension();
            $location = public_path('uploads/about/'.$name_gen_one);
            Image::make($image)->save($location);
            $save = 'uploads/about/'.$name_gen_one;
            $data['image'] = $save;

        }

        AboutBusiness::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('about-business.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(AboutBusiness $aboutBusiness)
    {
        return view('admin.about.business.form', compact('aboutBusiness'));
    }

    public function update(AboutBusinessRequestForm $request, AboutBusiness $aboutBusiness)
    {
        $data = $request->validated();

        if ($request->image) {

            if ($aboutBusiness->image) {
                 unlink($aboutBusiness->image);
            }
            $image = $request->file('image');
            $name_gen_one = "business". time() . '.' . $image->extension();
            $location = public_path('uploads/about/'.$name_gen_one);
            Image::make($image)->save($location);
            $save = 'uploads/about/'.$name_gen_one;
            $data['image'] = $save;

        }
        
        $aboutBusiness->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('about-business.index');
                
    }
}
