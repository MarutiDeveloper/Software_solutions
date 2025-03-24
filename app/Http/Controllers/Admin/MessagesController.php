<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    // Display all messages in the admin dashboard
    public function index()
{
    $contacts = Contact::orderBy('created_at', 'desc')->get();
    return view('admin.messages.show-messages', compact('contacts'));
}

    public function destroy($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
    
}



