<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('employees')->where('user_id', auth()->user()->id)->latest()->simplePaginate(10);
        // dd($companies);
        return view('pages.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Request Submitted
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        //Check if the picture is Set
        if ($request->hasFile('logo')) {
            //Get file Extension
            $filenamewithextension = $request->file('logo')->getClientOriginalName();
            //Get Name
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //Store to filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('logo')->storeAs('public', $filenameToStore);
            // return $path;
        }else{
            $filenameToStore = 'logo.jpg';
            $path = $request->file('logo')->storeAs('public', 'logo.jpg');
        }
        // return $request->input('name');
        // return $path;
        // Submit to DB
        $company = new Company;
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->email = $request->input('email');
        $company->user_id = auth()->user()->id;
        $company->logo = $filenameToStore;
        $company->save();
        // Redirect upon Completion
        return redirect('/company')->with('success', 'Company Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // dd($company);
        return view('pages.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('pages.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //validate Inputs
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required',
            'email' => 'required|email',
        ]);

        //Find the company by ID
        $company = Company::find($company->id);
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->email = $request->input('email');
        $company->save();

        //Redirect upon successful editing
        return redirect('/company')->with('success', 'Company Successfully Updated');
        // $company->user_id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->id;
        $company->delete();
        return redirect('/company')->with('success', 'Company Deleted Successfully');
    }
}
