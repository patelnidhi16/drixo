<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function showreset(Request $request)
    {
        return view('admin.reset');
    }
    public function reset(Request $request)
    {
        return view('admin.reset');
    }
}
