<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkRequestForm;
use App\Models\Work;
use App\Models\WorkCategory;
use Image;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with('category')->get();

        return view('admin.work.work.index', compact('works'));

    }

    public function create()
    {
        $data['workCategories'] = WorkCategory::get();

        return view('admin.work.work.form', $data);  
    }

    public function store(WorkRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "work". time() . '.' . $image->extension();
            $location = public_path('uploads/work/'.$name_gen_one);
            Image::make($image)->save($location);
            $save = 'uploads/work/'.$name_gen_one;
            $data['image'] = $save;

        }

        Work::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('work.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Work $work)
    {
        $data['work']= $work;

        $data['workCategories'] = WorkCategory::get();

        return view('admin.work.work.form', $data);
    }

    public function update(WorkRequestForm $request, Work $work)
    {
        $data = $request->validated();

        if ($request->image) {

            // if ($work->image) {
            //      unlink($work->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "work". time() . '.' . $image->extension();
            $location = public_path('uploads/work/'.$name_gen_one);
            Image::make($image)->save($location);
            $save = 'uploads/work/'.$name_gen_one;
            $data['image'] = $save;

        }
        
        $work->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('work.index');
                
    }
    public function destroy(Work $work)
    {
        $work->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('work.index');

    }

    public function status($id)
    {
        $data = Work::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Work::where('id', $id)->update(['status' => $status]);

        return redirect()->route('work.index');

    }
}
