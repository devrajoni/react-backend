<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkGallery;
use Image;

class WorkGalleryController extends Controller
{
    public function index()
    {
        $workGalleries = WorkGallery::all();
        return view('admin.work.gallery.form', compact('workGalleries'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['image','required'],

        ]);

        if($request->image != null){
            $galleries = $request->file('image');
            foreach($galleries as $gallery){
                $gallery_one = null;
                // $gallery_two = null;
                $name_gen = "gallery".  "one". hexdec(uniqid()) . '.' . $gallery->extension();
                $location               = public_path('uploads/work/'.$name_gen);
                Image::make($gallery)->save($location);
                $gallery_one = 'uploads/work/'.$name_gen;
                $data_one = WorkGallery::create([
                    'image' => $gallery_one,
                ]);
            }
       }

       toastr()->success('Data has been updated successfully!', 'Congrats');

       return redirect()->route('work-gallery.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(WorkGallery $workGallery)
    {
        return view('admin.work.gallery.form', compact('workGallery'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(WorkGallery $workGallery)
    {
        $workGallery->delete();

        toastr()->success('Data has been deleted successfully!');

        return response()->json([
            'success' => 'Delete Successfully !!'
        ]);

        // return redirect()->route('work-gallery.index');
    }
}
