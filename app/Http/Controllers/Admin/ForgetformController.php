<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\Forgetform;
class ForgetformController extends Controller
{
    public function showform()
    {
        return view('admin.forgetform');
    }
    public function forgetform(Forgetform $request)
    {
        if (Admin::where('email', $request->email)->exists()) {
             if ($request->password == $request->cpassword) {
                    Admin::where("email", $request->email)->update([
                        "password" => Hash::make($request->password),
                    ]);
                    $data['success'] = "your password updated successfully";
                } else {
                    $data['error']['cpassword'] = "please enter confir password same as password";
                }
        }
        else{
            $data['error']['email'] = "This email not exist in db";
        }
        return $data;
    }
}
