<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    public function index()
    {
        return view('admin.temp_images.index');
    }
}
