<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    public function smsSetting()
    {
    	return view('admin.modules.sms.smsSetting');
    }

    public function smsToAll()
    {
    	return view('admin.modules.sms.smsToAll');
    }
    public function sendSms()
    {
    	return view('admin.modules.sms.sendSms');
    }
}
