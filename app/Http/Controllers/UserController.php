<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credential = $request->only('email', 'password');

        if (auth()->attempt($credential)) {
            return redirect("/products");
        } else {
            return redirect()->route("login")->with("error", "Email dan password tidak ditemukan di sistem");
        }
    }

    public function doLogout (Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index')->with('success', 'Anda berhasil keluar dari sistem');
    }

    public function createSample()
    {
        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('1234')
        // ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'fabianugerah@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        echo "User berhasil ditambahkan";
    }
}