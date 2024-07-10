<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth.register");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email|unique:users",
            "username" => "required|string|unique:users",
            "password" => "required|string|confirmed",
            "company_name" => "required|string",
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->npwp_number = null;
        $company->expired_date = now()->addDays(30);
        $company->status = "A";
        $company->create_user = null;
        $company->update_user = null;
        $company->save();

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->division_id = null;
        $user->company_id = $company->id;
        $user->type = "P";
        $user->status = "A";
        $user->create_user = null;
        $user->update_user = null;
        $user->save();

        $company->create_user = $user->id;
        $company->save();

        $user->create_user = $user->id;
        $user->save();

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route("login");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
