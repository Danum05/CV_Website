<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    
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
            // Jika berhasil login, Anda dapat memeriksa email untuk menentukan redirect
            switch (Auth::user()->email) {
                case 'admin@gmail.com':
                    return redirect('/identitas')->with('success', 'Berhasil login');
                    break;
    
                case 'danu@gmail.com':
                    return redirect('/danu-dashboard')->with('success', 'Berhasil login');
                    break;
        
                case 'rahma@gmail.com':
                    return redirect('/rahma-dashboard')->with('success', 'Berhasil login');
                    break;

                case 'reihan@gmail.com':
                    return redirect('/reihan-dashboard')->with('success', 'Berhasil login');
                    break;
            
                case 'yasmin@gmail.com':
                    return redirect('/yasmin-dashboard')->with('success', 'Berhasil login');
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
