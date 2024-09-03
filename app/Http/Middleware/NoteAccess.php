<?php

namespace App\Http\Middleware;

use App\Models\note;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NoteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $note = note::where('slug', $request->slug)->first();
        if ($note->user_id != Auth::user()->id) {
            return response()->view('errors.403');
        }
        return $next($request);

    }
}
