<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class loginController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('login.register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect('/login')->with('success', 'Registration success. Please login!');
    }

    public function index(Request $request)
    {
        return view('login.index');
    }

    public function processLogin(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi'
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($infologin)) {
        // Jika berhasil login, Anda dapat memeriksa role untuk menentukan redirect
        switch (Auth::user()->role) {
            case 'superadmin':
                return redirect('/users')->with('success', 'Berhasil login');
                break;

            case 'admin':
                return redirect('/pendidikan')->with('success', 'Berhasil login');
                break;

            case 'user':
                // Get the user ID and construct the redirect URL
                $userId = Auth::id();
                return redirect("/identitas_user/{$userId}")->with('success', 'Berhasil login');
                break;

            default:
                return redirect('/login');
        }
    } else {
        return redirect('login')
            ->withErrors([
                'loginError' => 'Email dan password yang dimasukkan tidak sesuai. Pastikan Anda memasukkan informasi yang benar.'
            ]);
    }
}


    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('login')->with('success', 'Berhasil logout');
    }
}
