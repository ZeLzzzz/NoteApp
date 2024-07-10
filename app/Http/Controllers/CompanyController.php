<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('edit-company-info');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updatecompany(Request $request)
    {
        $request->validate([ 
            'company_name' => 'required|string',
            'npwp_number' => 'required|integer',
        ]);

        $company = Company::find(Auth::user()->company_id);
        $company->company_name = $request->company_name;
        $company->npwp_number = $request->npwp_number;
        $company->update();

        return redirect()->back()->with('success', 'Company information updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
