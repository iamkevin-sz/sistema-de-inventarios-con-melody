<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));

    }


    public function edit(User $user)
    {

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));

    }


    public function update(Request $request, User $user)
    {
        // return $request->all();
        $user->roles()->sync($request->roles);

        return redirect() -> route('users.edit', $user)->with('info', 'El rol se actualizo correctamente');
    }
}
