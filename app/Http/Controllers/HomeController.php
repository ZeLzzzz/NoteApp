<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        if ($user->type == 'P') {
            return redirect()->route('dashboard');
        } elseif ($user->type == 'C') {
            return redirect()->route('welcome');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors([ 'notvalid,' => 'Login details are not valid' ]);
        }
    }
}
