<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['firstname' => 'Admin',
            'lastname' => '1',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '01779251787',
            'verified' => '1',
            'status' => '1',
            'image' => null,
            'password' =>Hash::make('admin1234'),
            
            'remember_token' => '',
        ]);
        $users = User::find($user->id);
        $users->name = $user->firstname.' '.$user->lastname;
        $users->update();
        $userss = User::create(
        [   'firstname' => 'Agent',
            'lastname' => 'Agent',
            'name' => 'Agent',
            'email' => 'agent@agent.com',
            'phone' => '01723030645',
            'verified' => '1',
            'status' => '1',
            'image' => null,
            'password' =>Hash::make('agent1234'),
           
            
            'remember_token' => '',
        ]
        );


        $usersss = User::find($userss->id);
        $usersss->name = $userss->firstname.' '.$userss->lastname;
        $usersss->update();

        //Roles & Permission
        Permission::create(['name' => 'Roles & Permission Access'  , 'guard_name' => 'web',]);
        Permission::create(['name' => 'Roles & Permission Create'  , 'guard_name' => 'web',]);
        Permission::create(['name' => 'Roles & Permission Edit'  , 'guard_name' => 'web',]);

        Role::create(['name' => 'superadmin', 'guard_name' => 'web',]);
        Role::create(['name' => 'agent' , 'guard_name' => 'web',]);

        $role = Role::where('name', 'superadmin')->first();
        $permissions = Permission::get();
        foreach ( $permissions as $code ) {
            $role->givePermissionTo($code);
        };

        $user = User::find(1);
        $user->assignRole('superadmin');
        $users = User::find(2);
        $users->assignRole('agent');
    }
}
