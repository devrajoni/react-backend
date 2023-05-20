<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequestForm;
use App\Models\Social;
use Image;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::first();

        return view('admin.social.form', compact('social'));

    }
    public function create()
    {

        
    }

    public function store(SocialRequestForm $request)
    {

        Social::create($request->validated());

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('social.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Social $social)
    {
        return view('admin.social.form', compact('social'));
    }

    public function update(SocialRequestForm $request, Social $social)
    {
        
        $social->update($request->validated());

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('social.index');
                
    }
}
