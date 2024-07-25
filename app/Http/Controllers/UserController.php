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
        
        return view('auth.register');
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
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'contact' => 'required|string',
            'date_naissance' => 'required|date',
            'email' => 'required|string|email|unique:users,email', 
            'password' => 'required|string|min:8', 
        ]);
    
        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);
        $userRole = Role::where('nom', 'User')->first();
        if (!$userRole) {
            return redirect()->back()->withErrors([
                'error' => 'Role "User" not found',
            ]);
        }
        $validatedData['role_id'] = $userRole->id;
        $user = User::create($validatedData);
    
        if ($user) {
            return redirect('/auth/login')->with('success', 'User created successfully. Please log in.');
        } else {
            return redirect()->back()->withErrors([
                'error' => 'Une erreur s\'est produite lors de la création de l\'utilisateur',
            ]);
        }
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
