<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return inertia('Users', [
            'users' => User::all()
        ]);
    }
    
    public function destroy(Request $request) {
        // User::find($request->id)->delete();

        return back()->with('success', 'User deleted.');
    }
    
}
