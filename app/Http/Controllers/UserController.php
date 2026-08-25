<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Users/Index', [
            'users' => User::when(
                request()->input('search'),
                function ($query, $search) {
                    return $query->where('nome', 'ILIKE', "%$search%");
                }
            )->paginate(10),
            'searched' => request()->input('search') ?? '',
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'password' => 'required|string',
        ]);

        User::create([
            'nome' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'User created.');
    }

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        return back()->with('success', 'User deleted.');
    }
}
