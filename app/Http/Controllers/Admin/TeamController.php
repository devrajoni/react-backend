<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequestForm;
use App\Models\Team;
use Image;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('admin.team.index', compact('teams'));

    }
    public function create()
    {
        return view('admin.team.form');  
    }

    public function store(TeamRequestForm $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/team/'.$name_gen_one);
            Image::make($image)->resize(769,1024)->save($location);
            $save = 'uploads/team/'.$name_gen_one;
            $data['image'] = $save;

        }

        Team::create($data);

        toastr()->success('Data has been insert successfully!', 'Congrats');

        return redirect()
                ->route('team.index');

    }

    public function show($id)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('admin.team.form', compact('team'));
    }

    public function update(TeamRequestForm $request, Team $team)
    {
        $data = $request->validated();

        if ($request->image) {

            // if ($team->image) {
            //      unlink($team->image);
            // }
            $image = $request->file('image');
            $name_gen_one = "banner". time() . '.' . $image->extension();
            $location = public_path('uploads/team/'.$name_gen_one);
            Image::make($image)->resize(769,1024)->save($location);
            $save = 'uploads/team/'.$name_gen_one;
            $data['image'] = $save;

        }
        
        $team->update($data);

        toastr()->success('Data has been update successfully!', 'Congrats');

        return redirect()
                ->route('team.index');
                
    }

    public function destroy(Team $team)
    {
        $team->delete();

        toastr()->success('Data has been delete successfully!');

        return redirect()
                ->route('team.index');

    }

    public function status($id)
    {
        $data = Team::select('status')->where('id', $id)->first();
        if ($data->status == 'Active') {
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        Team::where('id', $id)->update(['status' => $status]);

        return redirect()->route('team.index');

    }
}
