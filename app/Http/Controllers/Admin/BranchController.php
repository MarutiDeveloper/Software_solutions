<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('admin.multiple-branch.multiple-branch', compact('branches'));
    }

    public function store(Request $request)
{
    $request->validate([
        'branch_name' => 'required|string|max:255',
        'branch_code' => 'required|string|unique:branches|max:50',
        'branch_email' => 'required|email|unique:branches',
        'manager_name' => 'required|string|max:255',
        'status' => 'required|in:Active,Inactive',
    ]);

    Branch::create($request->all());

    return redirect()->route('admin.branches.index')->with('success', 'Branch added successfully.');
}

    public function edit($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return redirect()->route('admin.branches.index')->with('error', 'Branch not found.');
        }
        return view('admin.multiple-branch.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return redirect()->route('admin.branches.index')->with('error', 'Branch not found.');
        }

        $request->validate([
            'branch_name' => 'required|string|max:255',
            'branch_code' => 'required|string|max:50|unique:branches,branch_code,' . $id,
            'branch_email' => 'required|email|unique:branches,branch_email,' . $id,
            'manager_name' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $branch->update($request->all());
        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return redirect()->route('admin.branches.index')->with('error', 'Branch not found.');
        }

        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }
}
