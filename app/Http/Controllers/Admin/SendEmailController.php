<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ForgetMail;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Http\Requests\admin\Sendemail;

class SendEmailController extends Controller
{
	public function formview()
	{
		return view('admin.reset');
	}
	public function forgetmail(Sendemail $request)
	{
		// dd($request);
		FacadesMail::to($request->email)->send(new ForgetMail);
		$data = "forget password link send to your email";
		return $data;
	}
}
