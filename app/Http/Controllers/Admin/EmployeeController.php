<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.list', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('admin.employee.index')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        Employee::findOrFail($id)->update($request->all());
        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('admin.employee.index')->with('success', 'Employee deleted successfully.');
    }
}
