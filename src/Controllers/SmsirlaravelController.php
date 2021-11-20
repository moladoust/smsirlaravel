<?php

namespace Moladoust\Smsirlaravel\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Moladoust\Smsirlaravel\Smsirlaravel;
use Moladoust\Smsirlaravel\Models\SmsirlaravelLogs;


class SmsirlaravelController extends Controller
{

	// the main index page for administrators
	public function index() {

		// $r = Smsirlaravel::sendVerification('12345','09370034599');
// dd($r);

// $r = Smsirlaravel::ultraFastSend(['VerificationCode'=>'25441'],23156,'09370034599');
// dd($r);


		$credit = Smsirlaravel::credit();
		$smsirlaravel_logs = SmsirlaravelLogs::orderBy('id','DESC')->paginate(config('smsirlaravel.in-page'));
		
		// Smsirlaravel::send('salaam !', '09370034599');
		

		
		
		return view('smsirlaravel::index',compact('credit','smsirlaravel_logs'));
	}

	// administrators can delete single log
	public function delete() {
		SmsirlaravelLogs::where('id',Route::current()->parameters['log'])->delete();
		// return the user back to sms-admin after delete the log
		return back();
	}
}
