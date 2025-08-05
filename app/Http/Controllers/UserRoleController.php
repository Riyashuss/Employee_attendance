<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\UserRole;
use App\Policies\RolePolicy;

class UserRoleController extends Controller
{
    public function index(UserRole $model)
    {
        $this->authorize('manage-users', User::class);
        return view('laravel.role.index', ['roles' => $model->all()]);
    }

    public function create(UserRole $model)
    {
        return view('laravel.role.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:roles',
            'description' => 'required|max:255'
        ]);

        UserRole::create([
            'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);

        return redirect()->route('role-management')->with('succes', trans('words.rolesuccessfullyadded'));
    }


    public function edit($id)
    {
        $role = UserRole::find($id);
        return view('laravel.role.edit', compact('role'));
    }

    public function update($id)
    {
        $this->authorize('manage-users', User::class);
        $role = UserRole::find($id);

        $attributes = request()->validate([
            'name' => ['required',  Rule::unique('roles')->ignore($role->id)],
            'description' => 'required'
        ]);

        $role->update($attributes);

        return redirect()->route('role-management')->with('succes', trans('words.rolesuccessfullyupdate'));
    }

    public function destroy($id)
    {
        $this->authorize('manage-users', User::class);
        $role = UserRole::find($id);
        // check if it the role attached to an user
        if (!$role->users->isEmpty()) {
            return redirect()->route('role-management')->with('error', trans('words.thisrolehasusersattachedandcantbedeleted'));
        }
        $role->delete();
        return redirect()->route('role-management')->with('succes', trans('words.thisrolewassuccesfullydeleted'));
    }
}
