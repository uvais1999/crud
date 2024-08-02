<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function store($request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->role);

    }

    public function registerUser($request)
    {

        $this->validateData($request);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles("defualt role");

    }

    public function loginUser($request)
    {
        $this->loginValidateData($request);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd('eeee');
            $request->session()->regenerate();

            
        }
    }


    public function getAllUsers()
    {
        return User::get();
    }

    private function validateData($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed'],
        ]);
    }

    private function loginValidateData($request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
