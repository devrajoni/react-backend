<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SimilarProject;
use App\Models\Service;
use Image;

class SimilarProjectController extends Controller
{
    public function index()
    {
        $data['similarProjects'] = SimilarProject::with('similarService')->get();

        return view('admin.service.similiar-project.index', $data);
    }

    public function create()
    {
        $data['similarProjects'] = SimilarProject::get();

        $data['services'] = Service::all();

        return view('admin.service.similiar-project.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => ['required'],
            'image.*' => ['image','nullable'],

        ]);

        if($request->image != null){
            $galleries = $request->file('image');
            foreach($galleries as $gallery){
                $gallery_one = null;
                // $gallery_two = null;
                $name_gen = "gallery".  "one". hexdec(uniqid()) . '.' . $gallery->extension();
                $location               = public_path('uploads/service/'.$name_gen);
                Image::make($gallery)->save($location);
                $gallery_one = 'uploads/service/'.$name_gen;
                $data_one =SimilarProject::create([
                    'service_id' => $request->service_id,
                    'image' => $gallery_one,
                ]);
            }
       }

       toastr()->success('Data has been updated successfully!', 'Congrats');

       return redirect()->route('similar-project.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(SimilarProject $similarProject)
    {
        $data['similarProject'] = $similarProject;

        $data['similarProjects'] = SimilarProject::get();

        $data['services'] = Service::all();

        return view('admin.service.similiar-project.form', $data);
    }

    public function update(Request $request, SimilarProject $similarProject)
    {
        $data = $request->validate([
            'service_id' => ['required'],
            // 'image.*' => ['image','nullable'],

        ]);

        if($request->image != null){
            $galleries = $request->file('image');
            foreach($galleries as $gallery){
                $gallery_one = null;
                // $gallery_two = null;
                $name_gen = "gallery".  "one". hexdec(uniqid()) . '.' . $gallery->extension();
                $location               = public_path('uploads/service/'.$name_gen);
                Image::make($gallery)->save($location);
                $gallery_one = 'uploads/service/'.$name_gen;
                $data['image'] = $gallery_one;
                $data_one = SimilarProject::create([
                    'service_id' => $request->service_id,
                    'image' => $gallery_one,
                ]);
            }
        }
        $similarProject->update($data);

       toastr()->success('Data has been updated successfully!', 'Congrats');

       return redirect()->route('similar-project.index');
    }

    public function destroy(SimilarProject $similarProject)
    {
        $similarProject->delete();

        toastr()->success('Data has been deleted successfully!');

        return response()->json([
            'success' => 'Delete Successfully !!'
        ]);

        // return redirect()->route('similiar-project.index');
    }
}
