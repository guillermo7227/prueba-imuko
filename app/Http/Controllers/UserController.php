<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $request->merge(['password' => bcrypt(\Str::random(20))]);

        User::create($request->only('name', 'email', 'password'));

        return redirect()->route('users.index')
                         ->with(['status' => 'success', 'message' => 'Se creó el registro']);
    }

    public function edit(Request $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:4'
        ]);

        $user->update($request->only('name', 'email'));

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
            $user->save();
        }

        return redirect()->route('users.index')
                         ->with(['status' => 'success', 'message' => 'Se actualizó el registro']);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                         ->with(['status' => 'success', 'message' => 'Se eliminó el registro']);
    }
}
