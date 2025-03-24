<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    // 🟢 ADMIN SECTION

    // Show all team members (Admin Panel)
    public function adminIndex()
    {
        $teamMembers = Team::all();
        return view('admin.team.index', compact('teamMembers'));
    }

    // Show create form (Admin Panel)
    public function adminCreate()
    {
        return view('admin.team.create');
    }

    // Store new team member
    public function adminStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $teamMember = new Team();
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');
            $teamMember->image = $imagePath;
        }

        $teamMember->save();

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    // Show edit form
    public function adminEdit($id)
    {
        $teamMember = Team::findOrFail($id);
        return view('admin.team.edit', compact('teamMember'));
    }

    // Update team member
    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $teamMember = Team::findOrFail($id);
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;

        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $imagePath = $request->file('image')->store('team_images', 'public');
            $teamMember->image = $imagePath;
        }

        $teamMember->save();

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    // Delete team member
    public function adminDestroy($id)
    {
        $teamMember = Team::findOrFail($id);
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }
        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }

    // 🟢 FRONTEND SECTION

    public function frontendIndex()
{
    $teams = Team::all(); // Change variable name
    return view('frontend.team', compact('teams')); // Pass $teams to match Blade file
}


    // Show single team member (Frontend)
    public function frontendShow($id)
    {
        $teamMember = Team::findOrFail($id);
        return view('frontend.team.show', compact('teamMember'));
    }
}
