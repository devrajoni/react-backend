<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceWork;
use Image;

class ServieWorkController extends Controller
{
    public function index()
    {
        $serviceWorks = ServiceWork::all();
        return view('admin.service.gallery.form', compact('serviceWorks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['image','nullable'],

        ]);

        if($request->image != null){
            $galleries = $request->file('image');
            foreach($galleries as $gallery){
                $gallery_one = null;
                // $gallery_two = null;
                $name_gen = "gallery".  "one". hexdec(uniqid()) . '.' . $gallery->extension();
                $location               = public_path('uploads/service/'.$name_gen);
                Image::make($gallery)->resize(397,397)->save($location);
                $gallery_one = 'uploads/service/'.$name_gen;
                $data_one = ServiceWork::create([
                    'image' => $gallery_one,
                ]);
            }
       }

       toastr()->success('Data has been updated successfully!', 'Congrats');

       return redirect()->route('service-work.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(ServiceWork $serviceWork)
    {
        return view('admin.service.gallery.form', compact('serviceWork'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(ServiceWork $serviceWork)
    {
        $serviceWork->delete();

        toastr()->success('Data has been deleted successfully!');

        return response()->json([
            'success' => 'Delete Successfully !!'
        ]);

        // return redirect()->route('work-gallery.index');
    }
}
