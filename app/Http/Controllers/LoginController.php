<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public static function middleware(): array
    {
        return [ new Middleware(middleware: 'guest', except: [ 'index', 'show' ]) ];
    }
    /**
     * Display a listing of the resource.
     */

    public function login(Request $request): RedirectResponse
    {
        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([ 'email' => $request[ 'email' ], 'password' => $request[ 'password' ] ])) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([ 'errors' => 'Wrong username or password' ]);
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}
