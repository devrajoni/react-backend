<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutSkillRequestForm;
use App\Models\AboutSkill;

class AboutSkillController extends Controller
{
    public function index()
    {
        $aboutSkills = AboutSkill::all();

        return view('admin.about.skill.index', compact('aboutSkills'));

    }

    public function create()
    {

        return view('admin.about.skill.form');
    }

    public function store(AboutSkillRequestForm $request)
    {

        AboutSkill::create($request->validated());

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('about-skill.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(AboutSkill $aboutSkill)
    {
        return view('admin.about.skill.form', compact('aboutSkill'));
    }

    public function update(AboutSkillRequestForm $request, AboutSkill $aboutSkill)
    {
        
        $aboutSkill->update($request->validated());

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('about-skill.index');
                
    }

    public function destroy(AboutSkill $aboutSkill)
    {
        $aboutSkill->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('about-skill.index');

    }

    public function status($id)
    {
        $data = AboutSkill::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        AboutSkill::where('id', $id)->update(['status' => $status]);

        return redirect()->route('about-skill.index');

    }
}
