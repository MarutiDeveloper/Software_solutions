<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Response;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login()
    {
        return view('front.account.login');
    }
    public function register()
    {
        return view('front.account.register');
    }
    public function processRegister(Request $request)
    {
        $allowedDomains = ['gmail.com', 'outlook.com', 'hotmail.com']; // List of allowed email domains

        // Custom validation rule for email domain
        Validator::extend('allowed_domain', function ($attribute, $value, $parameters, $validator) use ($allowedDomains) {
            $emailDomain = substr(strrchr($value, "@"), 1); // Extract the domain from the email
            return in_array($emailDomain, $parameters); // Check if the domain is in the allowed list
        });

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => ['required', 'email', 'unique:users', 'allowed_domain:' . implode(',', $allowedDomains)],
            'password' => 'required|min:7|confirmed',
        ]);

        if ($validator->passes()) {
            // Create and save the user
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'You have been Successfully Registered!');

            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function authenticate(Request $request)
    {
        $allowedDomains = ['gmail.com', 'outlook.com', 'hotmail.com']; // List of allowed email domains

        // Extend Validator to check allowed email domains
        Validator::extend('allowed_domain', function ($attribute, $value, $parameters) {
            $emailDomain = substr(strrchr($value, "@"), 1); // Extract domain from email
            return in_array($emailDomain, $parameters); // Check if domain is in allowed list
        });

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'allowed_domain:' . implode(',', $allowedDomains)], // Validate email domain
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // The user is authenticated, perform necessary actions here

            if (session()->has('url.intended')) {
                return redirect(session()->get('url.intended'));
            }

            return redirect()->route('account.profile');
        } else {
            session()->flash('error', 'Either E-mail or Password is incorrect...!');
            return redirect()->route('account.login')->withInput($request->only('email'));
        }
    }
    public function profile(Request $request)
    {

    }
    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;

        // List of allowed email domains
        $allowedDomains = ['gmail.com', 'outlook.com', 'hotmail.com'];

        // Extend Validator to check allowed email domains
        Validator::extend('allowed_domain', function ($attribute, $value, $parameters) {
            $emailDomain = substr(strrchr($value, "@"), 1); // Extract domain from email
            return in_array($emailDomain, $parameters); // Check if domain is in allowed list
        });

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $userId . ',id',
                'allowed_domain:' . implode(',', $allowedDomains),
            ],
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Update user details
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        session()->flash('success', 'You have successfully updated your profile!');

        return response()->json([
            'status' => true,
            'message' => 'You have successfully updated your profile!',
        ]);
    }

    public function updateAddress(Request $request) 
    {
        $userId = Auth::user()->id;
    
        // Validation rules
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $userId, // Ensures email is unique except for the current user
            'country_id' => 'required|exists:countries,id', // Validates that the country exists in the countries table
            'address' => 'required|min:10', // Reduced minimum character count for flexibility
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zip' => 'required|min:5|max:10', // Ensures valid ZIP length
            'mobile' => 'required|digits_between:10,15', // Ensures valid phone number
        ]);
    
        // If validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    
        // Updating or creating the customer address

    
        // Flash success message and return response
        session()->flash('success', 'Address updated successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Address updated successfully.'
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('account.login')->with('success', ' You have Successfully logout..! ');
    }
 
    public function showChangePasswordForm()
    {
        return view('front.account.change-password');
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:10',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->passes()) {

            $user = User::select('id', 'password')->where('id', Auth::user()->id)->first();

            if (!Hash::check($request->old_password, $user->password)) {

                session()->flash('error', 'Your Old Password is incorrect, Please try again...!');
                return response()->json([
                    'status' => true,
                ]);
            }

            User::where('id', $user->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            session()->flash('success', 'Your  Password has been Updated Successfully...!');
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
    public function forgotPassword()
    {
        return view('front.account.forgot-password');
    }

    public function resetPassword ($token) {

        $tokenExists = \DB::table('password_reset_tokens')->where('token',$token)->first();

        if ($tokenExists == null) {
            return redirect()->route('front.forgotPassword')->with('error', 'Invalid Request...!');
        }

        return view('front.account.reset-password', [
            'token' =>  $token
        ]);
    }
    public function processResetPassword (Request $request) {
        $token = $request->token;

        $tokenObj = \DB::table('password_reset_tokens')->where('token',$token)->first();

        if ($tokenObj == null) {
            return redirect()->route('front.forgotPassword')->with('error', 'Invalid Request...!');
        }

        $user = User::where('email', $tokenObj->email)->first();

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);
        if ($validator->fails()) {
            return redirect()->route('front.resetPassword', $token)->withErrors($validator);
        }

        User::where('id', $user->id)->update([
            'password'  => Hash::make($request->new_password)
        ]);
        \DB::table('password_reset_tokens')->where('email',  $user->email)->delete();
        return redirect()->route('account.login')->with('success', 'You have Successfully Updated your Password...!');
    }
}