<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company)
    {
        return view('pages.employee.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company)
    {
        // Validate Request Submitted
        $this->validateEmployee($request);

        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->user_id = auth()->user()->id;
        $employee->company_id = $company;
        $employee->phone_number = $request->input('phone_number');
        $employee->save();
        // Redirect upon Completion
        return redirect()->route('company.show', $company)->with('success', 'Employee Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($company, $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        // dd($employee);
        return view('pages.employee.show', compact('employee', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($company, $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('pages.employee.edit', compact('employee', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company, $employeeId)
    {
        //validate Inputs
        $this->validateEmployee($request);

        //Find the company by ID
        $employee = Employee::findOrFail($employeeId);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone_number = $request->input('phone_number');
        $employee->email = $request->input('email');
        $employee->save();

        //Redirect upon successful editing
        return redirect()->route('company.show', $company)->with('success', 'Employee Successfully Updated');
        // $company->user_id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($company, $employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        // return redirect('/company')->with('success', 'Company Deleted Successfully');
        // return view('pages.company.show', compact('company'))->with('success', 'Company Deleted Successfully');
        return redirect()->route('company.show', $company)->with('success', 'Employee Deleted Successfully');
    }

    public function validateEmployee(Request $request)
    {

		$rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|phone',
        ];

        $messages = [
            
        ];
         
		$this->validate($request, $rules, $messages);
    }
}
