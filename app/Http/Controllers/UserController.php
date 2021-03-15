<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/user')->with('notif', 'User Baru Berhasil Ditambah');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('notif', 'User '.$user->name.' Berhasil Dihapus');
    }
}
