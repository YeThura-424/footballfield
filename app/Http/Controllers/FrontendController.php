<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Stadium;
use App\Pitch;
use App\Event;
use App\Price;
use App\Rentdetail;
use App\Eventdetail;
use App\Time;

class FrontendController extends Controller
{
    public function index()
    {
    	$stadia = Stadium::all();
    	$pitches = Pitch::all();
    	$events = Event::all();
    	return view('frontend.index',compact('stadia','pitches','events'));
    }

    public function available()
    {
    	$pitches = Pitch::all();
    	return view('frontend.availablepitch',compact('pitches'));
    }

    public function pitch($id)
    {
    	$pitches = Pitch::where('stadia_id',$id)->get();
    	$stadia = Stadium::find($id);
    	return view('frontend.pitch',compact('pitches','stadia'));
    }

    public function bookingdetail($id)
    {
        //dd($id);
        $times = Time::all();
        $prices = Price::all();
        $pitch = Pitch::find($id);
        $rentdetail = Rentdetail::where('pitch_id',$id)->get();
        return view('frontend.bookingdetail',compact('pitch','prices','times','rentdetail'));
        
        
    }

    public function price($id)
    {
        //dd($id);
        $rent = Rentdetail::where('pitch_id',$id)->get();
       
        return response()->json($rent);
    }

    public function rentdetail(Request $request,$id)
    {
        //dd($id);
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $rentdate = $request->rentdate;
        $renthour = $request->totalhour;
        $totalprice = $request->totalprice;
        $pitch = Pitch::find($id);
        $pitchid = $pitch->id;
        $auth = Auth::user();
        $userid = $auth->id;

        $rentdetail = new Rentdetail;
        $rentdetail->starttime = $starttime;
        $rentdetail->endtime = $endtime;
        $rentdetail->rentdate = $rentdate;
        $rentdetail->renthour = $renthour;
        $rentdetail->totalprice = $totalprice;
        $rentdetail->pitch_id = $pitchid;
        $rentdetail->user_id = $userid;
        $rentdetail->save();

        return redirect()->route('success');
    }

    public function success()
    {
        return view('frontend.success');
    }

    public function event($id)
    {
        $event = Event::find($id);
        $eventdetails = Eventdetail::all();
        return view('frontend.event',compact('event','eventdetails'));
    }

    public function eventbooking(Request $request,$id) 
    {
        //dd($request);

        $teamname = $request->teamname;
        $teamno = $request->teammember;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $event = Event::find($id);
        $eventid = $event->id;
        $pitch = Pitch::find($id);
        $pitchid = $pitch->id;
        $auth = Auth::user();
        $userid = $auth->id;

        $eventdetail = new Eventdetail;
        $eventdetail->startdate = $startdate;
        $eventdetail->enddate = $enddate;
        $eventdetail->teamname = $teamname;
        $eventdetail->teamno = $teamno;
        $eventdetail->event_id = $eventid;
        $eventdetail->user_id = $userid;
        $eventdetail->pitch_id = $pitchid;
        $eventdetail->save();

         return redirect()->route('eventsuccess');
    }

    public function eventsuccess()
    {
        return view('frontend.eventsuccess');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function bookinglist($id)
    {
        $rentdetail = Rentdetail::where('user_id',$id)->get();
        $renthour = Rentdetail::where('user_id',$id)->sum('renthour');
        $totalprice = Rentdetail::where('user_id',$id)->sum('totalprice');
        return view('frontend.bookinglist',compact('rentdetail','renthour','totalprice'));
    }
}
