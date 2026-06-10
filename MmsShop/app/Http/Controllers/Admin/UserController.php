<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('ads.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('ads.users.edit_user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role'  => 'required|in:user,admin',
        ]);

        $user->update($request->only('role'));
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur modifié.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
    }
}