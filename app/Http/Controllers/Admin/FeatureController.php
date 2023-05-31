<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FeatureRequestForm;
use App\Models\Feature;
use App\Models\Service;
use Image;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::with('featureService')->get();
        return view('admin.service.feature.index', compact('features'));

    }

    public function create()
    {

        $services = Service::all();

        return view('admin.service.feature.form', compact('services'));
    }

    public function store(FeatureRequestForm $request)
    {

        $data = $request->validated();

        if ($request->icon) {
            $image = $request->file('icon');
            $name_gen_one = "feature". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/service/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        Feature::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('feature.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Feature $feature)
    {
        $data['feature'] = $feature;
        $data['services'] = Service::get();

        return view('admin.service.feature.form', $data);
    }

    public function update(FeatureRequestForm $request, Feature $feature)
    {
        
        $data = $request->validated();

        if ($request->icon) {
            // if ($feature->icon) {
            //      unlink($feature->icon);
            // }
            $image = $request->file('icon');
            $name_gen_one = "feature". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/service/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        $feature->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('feature.index');
                
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('feature.index');

    }

    public function status($id)
    {
        $data = Feature::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Feature::where('id', $id)->update(['status' => $status]);

        return redirect()->route('feature.index');

    }
}
