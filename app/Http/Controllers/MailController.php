<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Rentdetail;

class MailController extends Controller
{
    public function basic_email(Request $request)
    {
        $status = 1;
        $rentdetail = Rentdetail::where('id', request('id'))->first();
        $rentdetail->status = $status;
        $rentdetail->save();
        $data = array('name' => request('name'));

        Mail::send(['text' => 'backend.mail.confirm'], $data, function ($message) {
            $message->to(request('email'), 'Sending Access Account')->subject('Confirm Your Booking');
            $message->from('fuselworld@yethura.me', 'Fusel World');
        });
        return redirect()->route('backside.rentdetail.index')->with('successMsg', 'Booking STATUS is CHANGED in your data');
        // return response()->json(['success'=>'Please Check your Email and Access the Account!']);
    }
    public function html_email(Request $request)
    {
        $rentdetail = Rentdetail::where('id', request('id'))->first();

        $rentdetail->delete();
        $data = array('name' => request('name'));

        Mail::send(['text' => 'backend.mail.cancel'], $data, function ($message) {
            $message->to(request('email'), 'Sending Access Account')->subject('Cancelling Your Booking');
            $message->from('fuselworld@yethura.me', 'Fusel World');
        });
        return redirect()->route('backside.rentdetail.index')->with('successMsg', 'Booking is DELETED in your data');
        // return response()->json(['success'=>'Please Check your Email and Access the Account!']);
    }
}
