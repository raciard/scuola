<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('profile')
            ->with('user', Auth::user());
    }

    public function submit(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->has('name')) {
            $user->name = $request->get('name');
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return redirect()->back()
            ->with("status", "User has been updated successfully!");
    }
}
