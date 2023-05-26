<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactCardRequestForm;
use App\Models\ContactCard;
use Illuminate\Http\Request;
use Image;

class ContactCardController extends Controller
{
    public function index()
    {
        $contactCards = ContactCard::all();

        return view('admin.contact.index', compact('contactCards'));

    }

    public function create()
    {

        return view('admin.contact.form');
    }

    public function store(ContactCardRequestForm $request)
    {

        $data = $request->validated();

        if ($request->icon) {
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/contact/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/contact/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        ContactCard::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('contact-card.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(ContactCard $contactCard)
    {
        return view('admin.contact.form', compact('contactCard'));
    }

    public function update(ContactCardRequestForm $request, ContactCard $contactCard)
    {
        
        $data = $request->validated();

        if ($request->icon) {
            if ($service->icon) {
                 unlink($service->icon);
            }
            $image = $request->file('icon');
            $name_gen_one = "icon". time() . '.' . $image->extension();
            $location = public_path('uploads/contact/'.$name_gen_one);
            Image::make($image)->resize(40,40)->save($location);
            $save_two = 'uploads/contact/'.$name_gen_one;
            $data['icon'] = $save_two;

        }

        $contactCard->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('contact-card.index');
                
    }

    public function destroy(ContactCard $contactCard)
    {
        $contactCard->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('contact-card.index');

    }

    public function status($id)
    {
        $data = ContactCard::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        ContactCard::where('id', $id)->update(['status' => $status]);

        return redirect()->route('contact-card.index');

    }
}
