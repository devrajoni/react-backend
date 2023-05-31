<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutCardRequestForm;
use App\Models\AboutCard;
use Image;

class AboutCardController extends Controller
{
    public function index()
    {
        $aboutCards = AboutCard::all();

        return view('admin.about.card-content.index', compact('aboutCards'));

    }

    public function create()
    {

        return view('admin.about.card-content.form');
    }

    public function store(AboutCardRequestForm $request)
    {
        $data = $request->validated();

        if ($request->icon) {
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/about/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/about/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        AboutCard::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('about-card.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(AboutCard $aboutCard)
    {
        return view('admin.about.card-content.form', compact('aboutCard'));
    }

    public function update(AboutCardRequestForm $request, AboutCard $aboutCard)
    {
        $data = $request->validated();

        if ($request->icon) {
            // if ($service->icon) {
            //      unlink($service->icon);
            // }
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/about/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/about/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        $aboutCard->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('about-card.index');
                
    }

    public function destroy(AboutCard $aboutCard)
    {
        $aboutCard->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('about-card.index');

    }

    public function status($id)
    {
        $data = AboutCard::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        AboutCard::where('id', $id)->update(['status' => $status]);

        return redirect()->route('about-card.index');

    }
}
