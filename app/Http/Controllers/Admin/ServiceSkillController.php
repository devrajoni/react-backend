<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceSkillRequestForm;
use App\Models\ServiceSkill;
use App\Models\Service;

class ServiceSkillController extends Controller
{
    public function index()
    {
        $serviceSkills = ServiceSkill::with('serviceSkill')->get();

        return view('admin.service.skill.index', compact('serviceSkills'));

    }

    public function create()
    {
        $services = Service::all();

        return view('admin.service.skill.form', compact('services'));
    }

    public function store(ServiceSkillRequestForm $request)
    {

        ServiceSkill::create($request->validated());

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('service-skill.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(ServiceSkill $serviceSkill)
    {
        $data['serviceSkill'] = $serviceSkill;

        $data['services'] = Service::all();

        return view('admin.service.skill.form', $data);
    }

    public function update(ServiceSkillRequestForm $request, ServiceSkill $serviceSkill)
    {
        
        $serviceSkill->update($request->validated());

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('service-skill.index');
                
    }

    public function destroy(ServiceSkill $serviceSkill)
    {
        $serviceSkill->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('service-skill.index');

    }

    public function status($id)
    {
        $data = ServiceSkill::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        ServiceSkill::where('id', $id)->update(['status' => $status]);

        return redirect()->route('service-skill.index');

    }
}
