<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequestForm;
use App\Models\Setting;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.form', compact('setting'));

    }
    public function create()
    {

    }

    public function store(SettingRequestForm $request)
    {
        $data = $request->validated();

        if ($request->company_logo) {
            $image = $request->file('company_logo');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/setting/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $save = 'uploads/setting/'.$name_gen_one;
            $data['company_logo'] = $save;
        }
        if ($request->favicon) {
            $image = $request->file('favicon');
            $name_gen_one = "favicon". time() . '.' . $image->extension();
            $location = public_path('uploads/setting/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $favicon = 'uploads/setting/'.$name_gen_one;
            $data['favicon'] = $favicon;

        }

        Setting::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('setting.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Setting $setting)
    {
        return view('admin.setting.form', compact('setting'));
    }

    public function update(SettingRequestForm $request, Setting $setting)
    {
        $data = $request->validated();

        if ($request->company_logo) {

            if ($setting->company_logo) {
                 unlink($setting->company_logo);
            }
            $image = $request->file('company_logo');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/setting/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $save = 'uploads/setting/'.$name_gen_one;
            $data['company_logo'] = $save;

        }

        if ($request->favicon) {

            if ($setting->favicon) {
                 unlink($setting->favicon);
            }
            $image = $request->file('favicon');
            $name_gen_one = "favicon". time() . '.' . $image->extension();
            $location = public_path('uploads/setting/'.$name_gen_one);
            Image::make($image)->resize(816,684)->save($location);
            $favicon = 'uploads/setting/'.$name_gen_one;
            $data['favicon'] = $favicon;

        }
        
        $setting->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('setting.index');
                
    }
}
