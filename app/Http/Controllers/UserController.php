<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('auth.register', $roles);
    }
    public function admin()
    {
        // Fetch all users
        $users = User::all();

        // Fetch all IMCs with their associated users
        $icms = Imc::with('users')->get();

        // Pass data to the view
        return view('app', [
            'users' => $users,
            'icms' => $icms
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::with('role', 'imcs')->find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
