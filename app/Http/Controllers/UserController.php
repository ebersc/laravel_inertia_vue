<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return inertia('Users/Index', [
            'users' => User::when(
                request()->input('search'),
                function($query, $search){
                    return $query->where('nome', 'ILIKE', "%$search%");
                }
            )->paginate(10),
            'searched' => request()->input('search') ?? ''
        ]);
    }

    public function create() {
        return inertia('Users/Create');    
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
    
    
    
    public function destroy(Request $request) {
        User::find($request->id)->delete();

        return back()->with('success', 'User deleted.');
    }
    
}
