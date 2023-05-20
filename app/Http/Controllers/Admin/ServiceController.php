<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequestForm;
use App\Models\Service;
use Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.service.index', compact('services'));

    }

    public function create()
    {

        return view('admin.service.form');
    }

    public function store(ServiceRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "image". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save_one = 'uploads/service/'.$name_gen_one;
            $data['image'] = $save_one;
        }

        if ($request->icon) {
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(375,150)->save($location);
            $save_two = 'uploads/service/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        Service::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('service.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Service $service)
    {
        return view('admin.service.form', compact('service'));
    }

    public function update(ServiceRequestForm $request, Service $service)
    {
        $data = $request->validated();

        if ($request->image) {
            if ($service->image) {
                 unlink($service->image);
            }
            $image = $request->file('image');
            $name_gen_one = "image". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(2379,1213)->save($location);
            $save_one = 'uploads/service/'.$name_gen_one;
            $data['image'] = $save_one;
        }

        if ($request->icon) {
            if ($service->icon) {
                 unlink($service->icon);
            }
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/service/'.$name_gen_one);
            Image::make($image)->resize(375,150)->save($location);
            $save_two = 'uploads/service/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        $service->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('service.index');
                
    }

    public function destroy(Service $service)
    {
        $service->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('service.index');

    }

    public function status($id)
    {
        $data = Service::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Service::where('id', $id)->update(['status' => $status]);

        return redirect()->route('service.index');

    }
}
