<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'roles_as' => ['required', 'string'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_as' => $request->roles_as,
        ]);
        return redirect('admin/users')->with('message', 'User Created Successfully');
    }

    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $userId)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'roles_as' => ['required', 'string'],
        ]);

        $user = User::findOrFail($userId);

        $user->update([
            'name' => $request->name,
            'email' => $user->email,
            'password' => Hash::make($request->password),
            'roles_as' => $request->roles_as,
        ]);
        return redirect('admin/users')->with('message', 'User Updated Successfully');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('message', 'User Deleted Successfully');
        } else {
            return redirect()->route('users.index')->with('message', 'User ID Not Found');
        }
    }
}
