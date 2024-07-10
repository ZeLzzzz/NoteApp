<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class EmailVerifyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect('home');
            } else {
                $request->user()->sendEmailVerificationNotification();
                return response()->view('auth.verify-email-preview');
            }
        }

        return $next($request);
    }
}
