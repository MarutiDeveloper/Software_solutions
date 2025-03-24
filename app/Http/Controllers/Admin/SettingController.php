<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    // Show the settings page// Show the settings page
    public function index()
    {
        // Fetch all settings as a collection
        $settings = Setting::all()->keyBy('key'); // Key the collection by the key column

        return view('admin.settings.index', compact('settings'));
    }


    // Store or update settings
    public function update(Request $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'site_name' => 'required|string|max:255',
                'site_email' => 'required|email|max:255',
                'site_phone' => 'required|string|max:20',
                'facebook' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
            ]);
    
            // Remove empty values to prevent unnecessary updates
            $filteredData = array_filter($validatedData, fn($value) => !is_null($value) && trim($value) !== '');
    
            // Update or create general settings
            foreach ($filteredData as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => trim($value)] // Trim to remove unnecessary spaces
                );
            }
    
            return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function processChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'conf_password' => 'required|same:new_password'
        ]);

        $admin = User::where('id', Auth::guard('admin')->user()->id)->first();

        if ($validator->passes()) {

            if (!Hash::check($request->old_password, $admin->password)) {
                session()->flash('error', 'Your Old Password has been Wrong Please Check...');
                return response()->json([
                    'status' => true,
                ]);
            }

            User::where('id', Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            session()->flash('success', 'Your  Password has been Updated successfully Please Check.');
            return response()->json([
                'status' => true,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
