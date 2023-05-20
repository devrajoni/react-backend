<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;
use DataTables;
use Auth;
use Str;
class RoleCreateController extends Controller
{
    public function index(){
        $data = Role::with('users')->get();
        

        if(request()->ajax()) {
            $data = Role::with('users')->get();
            return DataTables::of($data)
            ->addColumn('action', function($data){
                $button = '<div class = "d-flex">';
                
        
                   if($data->role_name != 'superadmin'){
                    $button .= '<a href="'.url('/admin/role/edit/'.$data->id).'" class="action-btns1"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="feather feather-edit text-primary"></i></a>';
                   }
                
                $button .= '</div>';
                return $button;
            })
            ->addColumn('rolescount', function($data){
                return '<span class="badge badge-primary">'.$data->users->count().'</span>';
            })
            
            ->addColumn('name', function($data){
                return Str::limit($data->name, '40');
            })->addColumn('permissioncount', function($data){
                return '<span class="badge badge-success">'.$data->permissions->count().'</span>';
            })
            ->addIndexColumn()
            ->rawColumns(['action','rolescount','name','permissioncount'])
            ->make(true);
        }

        return view('admin.rolecreate.index');
    }

    public function create(){
        $this->authorize('Roles & Permission Create');
        $permission = Permission::get();
        $data['permission'] = $permission;
    
        return view('admin.rolecreate.create')->with($data);
    }

    public function edit($id)
    {
        $this->authorize('Roles & Permission Edit');

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.rolecreate.edit', compact('role', 'permissions'));
    }
    public function store(Request $request)
    {
        $this->authorize('Roles & Permission Create');
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $data   =   $request->only(['name']);
        $data['guard_name'] =   'web';
        $role = Role::create($data);
        if($request->get('permission')){
            foreach($request->get('permission') as $prm){
                $role->givePermissionTo($prm);
            }
        }
        
        return redirect('admin/role')->with('success','Role Created');
    }

     public function update(Request $request, $id)
    {
        $this->authorize('Roles & Permission Edit');

        $role = Role::find($id);
        
        if($role->name == $request->name){
                if($request->get('permission')){
            foreach ($request->get('permission') as $value) {
                $permission[] = $value;
            }
        }

        $role->syncPermissions($request->get('permission'));
        }
        else{
             $request->validate([
                "name" => "required|max:255|unique:roles,name",
            ]);
            
            $role->update($request->only(['name']));
            if($request->get('permission')){
                foreach ($request->get('permission') as $value) {
                    $permission[] = $value;
                }
            }
            $role->syncPermissions($request->get('permission'));
        }
     
        return redirect('admin/role')->with('success', 'Update Successfully');
    }
}
