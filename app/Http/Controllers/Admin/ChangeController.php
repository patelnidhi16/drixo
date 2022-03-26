<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\AdminRequest;
class ChangeController extends Controller
{
    public function changeform()
    {
        return view('admin.change');
    }
    public function change(AdminRequest $request)
    {
        $hash = Auth::guard('admin')->user()->password;
        // $request->validate([
        //     'currentpassword' => 'required',
        //     'password' => 'required',
        //     'cpassword' => 'required',
        // ]);

        if (Admin::where('email', $request->email)->exists()) {
            if (Hash::check($request->currentpassword, $hash)) {
                if ($request->password == $request->cpassword) {
                    Admin::where("email", $request->email)->update([
                        "password" => Hash::make($request->password),
                    ]);
                    $data['success'] = "your password updated successfully";
                } else {
                    $data['error']['cpassword'] = "please enter confir password same as password";
                }
            } else {
                $data['error']['currentpassword'] = "password not match with record";
            }
        }
        return $data;
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
