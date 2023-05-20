<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use App\Models\User;

use Hash;
use DataTables;
use Illuminate\Support\Str;
class AgentCreateController extends Controller
{
    public function index()
    {
        

        $user = User::get();
        $data['users'] = $user;
     
        $roles = Role::get();
        
        $data['roles'] = $roles;
    
        return view('admin.agent.index')->with($data);
       
    }

    public function create()
    {
        $roles = Role::get();
        $data['roles'] = $roles;

        return view('admin.agent.agentprofilecreate')-> with($data);
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'empid' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:8',
        ]);
        if($request->phone){
            $request->validate([
                'phone' => 'numeric',
            ]);
        }
        
        $user = User::create([
            'firstname' => Str::ucfirst($request->input('firstname')),
            'lastname' => Str::ucfirst($request->input('lastname')),
            'name' => Str::ucfirst($request->input('firstname')) . Str::ucfirst($request->input('lastname')),
            'empid' => Str::upper($request->empid),
            'email' => $request->email,
            'gender' => $request->gender,
            'status' => '1',
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'image' => null,
            'verified' => '1',
            
        ]);

        $users = User::find($user->id);
        $users->name = $user->firstname.' '.$user->lastname;
        $users->update();
        $user->assignRole([$request->role]);
        
        return redirect()->route('admin.emp.index')->with('success', 'Add Successfully');
    }

    public function status(Request $request, $id)
    {
        $calID = User::find($id);
        $calID->status = $request->status;
        $calID->save();

        return response()->json(['code'=>200, 'success'=> 'Status Update Successfully'], 200);

    }


    public function show($id)
    {
        
        $user = User::where('id', $id)->first();
        $roles = Role::get();
        $data['roles'] = $roles;
        
        return view('admin.agent.agentprofile',compact('user'))->with($data);
    }
}
