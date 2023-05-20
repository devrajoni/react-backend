<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\AboutRequestForm;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('admin.about.about.index', compact('abouts'));

    }

    public function create()
    {

        return view('admin.about.about.form');
    }

    public function store(AboutRequestForm $request)
    {

        About::create($request->validated());

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('about.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(About $about)
    {
        return view('admin.about.about.form', compact('about'));
    }

    public function update(AboutRequestForm $request, About $about)
    {
        
        $about->update($request->validated());

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('about.index');
                
    }

    public function destroy(About $about)
    {
        $about->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('about.index');

    }

    public function status($id)
    {
        $data = About::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        About::where('id', $id)->update(['status' => $status]);

        return redirect()->route('about.index');

    }
}
