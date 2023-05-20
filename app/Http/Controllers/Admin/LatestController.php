<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LatestRequestForm;
use App\Models\Latest;
use Image;

class LatestController extends Controller
{
    public function index()
    {
        $latests = Latest::all();

        return view('admin.latest.index', compact('latests'));

    }

    public function create()
    {
        return view('admin.latest.form');  
    }

    public function store(LatestRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/latest/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $save = 'uploads/latest/'.$name_gen_one;
            $data['image'] = $save;

        }

        Latest::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('latest.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Latest $latest)
    {
        return view('admin.latest.form', compact('latest'));
    }

    public function update(LatestRequestForm $request, Latest $latest)
    {
        $data = $request->validated();

        if ($request->image) {

            if ($latest->image) {
                 unlink($latest->image);
            }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/latest/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $save = 'uploads/latest/'.$name_gen_one;
            $data['image'] = $save;

        }
        
        $latest->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('latest.index');
                
    }
    public function destroy(Latest $latest)
    {
        $latest->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('latest.index');

    }

    public function status($id)
    {
        $data = Latest::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Latest::where('id', $id)->update(['status' => $status]);

        return redirect()->route('latest.index');

    }
}
