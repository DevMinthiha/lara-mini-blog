<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function addRole()
    {
        $items = ['Admin', 'Editor', 'Manager', 'Moderator', 'Developer', 'User'];
        foreach($items as $item)
        {
            $role = new Role();
            $role->name = $item;
            $role->save();
        }
        return "Role added successfully";
    }

    public function addUser()
    {
        $user = new User();
        $user->name = "agag";
        $user->email = "agag@gmail.com";
        $user->password = Hash::make('12345');
        $user->save();
        $user->roles()->attach([1,5]);
        return "User added successfully";
    }

    public function getRolesByUser()
    {
        $roles = User::find(2)->roles;
        foreach($roles as $role)
        {
            echo $role->name;
        }
    }

    public function getUserByRoles()
    {
        $users = Role::find(5)->users;
        return $users;
    }

}


