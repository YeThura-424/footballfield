<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Book;

class MailController extends Controller
{
    public function basic_email(Request $request)
    {
        $book = Book::where('id', request('id'))->first();
        $book->status = 'Confirmed';
        $book->save();
        $data = array('name' => request('name'));

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to(request('email'), 'Sending Access Account')->subject('Confirm Your Booking');
            $message->from('_mainaccount@minkhantthumm.me', 'Venues Rental Service');
        });
        return redirect()->route('rooms.index');
        // return response()->json(['success'=>'Please Check your Email and Access the Account!']);
    }
    public function html_email(Request $request)
    {
        $book = Book::where('id', request('id'))->first();
        $book->status = 'Cancelled';
        $book->save();
        $data = array('name' => request('name'));

        Mail::send(['text' => 'mail2'], $data, function ($message) {
            $message->to(request('email'), 'Sending Access Account')->subject('Cancelling Your Booking');
            $message->from('_mainaccount@minkhantthumm.me', 'Venues Rental Service');
        });
        return redirect()->route('rooms.index');
        // return response()->json(['success'=>'Please Check your Email and Access the Account!']);
    }
}
