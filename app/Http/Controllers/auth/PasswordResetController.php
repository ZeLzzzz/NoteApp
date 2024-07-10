<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    public function risetlinkreq(): View
    {
        return view('auth.reset-password');
    }

    public function submitemail(Request $request): RedirectResponse
    {
        $request->validate([ 'email' => 'required|email' ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('password.reset.preview')->with([ 'status' => __($status) ])
            : back()->withErrors([ 'email' => __($status) ]);
    }

    public function forgotpasswordpreview(): View
    {
        return view('auth.forgot-password-preview');
    }

    public function risettingpassword(Request $request, $token): View
    {
        $email = $request->email;

        if (!$email) {
            return redirect('/')->with('error', 'Email is required.');
        }

        Session::put('reset_email', $email);
        Session::put('reset_token', $token);

        return view('auth.resetting-password');
    }

    public function submitnewpassword(Request $request): RedirectResponse
    {
        $email = Session::get('reset_email');
        $token = Session::get('reset_token');

        $request->validate([ 
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            [ 
                'email' => $email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'token' => $token
            ],
            function (User $user, string $password) {
                $user->forceFill([ 
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if (Auth::check()) {
            Auth::logout();
        }

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors([ 'email' => [ __($status) ] ]);
    }
}
