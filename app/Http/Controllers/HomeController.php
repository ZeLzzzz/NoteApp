<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        if ($user) {
            return redirect()->route('dashboard');
        } else {
            Auth::logout();
            // Menghapus semua session
            session()->flush();
            return redirect()->route('login')->withErrors([ 'notvalid,' => 'Login details are not valid' ]);
        }
    }
}
