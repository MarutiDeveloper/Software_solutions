<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        // Fetch all settings as a key-value pair collection
        $settings = Setting::pluck('value', 'name')->toArray(); // Convert to array for easier usage

        return view('admin.settings.index', compact('settings'));
    }


    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'facebook' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
            ]);

            $validatedData->Save();

            return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    /**
     * Show the change password form.
     */
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    /**
     * Process change password request.
     */
    public function processChangePassword(Request $request)
    {
        // Validate password fields
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'conf_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $admin = Auth::guard('admin')->user();

        // Check if old password is correct
        if (!Hash::check($request->old_password, $admin->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Your old password is incorrect. Please try again.'
            ]);
        }

        // Update password
        $admin->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'status' => true,
            'message' => 'Your password has been updated successfully!'
        ]);
    }
}
