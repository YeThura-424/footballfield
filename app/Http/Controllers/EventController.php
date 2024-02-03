<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pitch;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.list',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pitches = Pitch::all();
        return view('backend.event.new',compact('pitches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $name = $request->name;
        $photo = $request->photo;

        // file upload 

            $imageName = time().'.'.$photo->extension();
            $photo->move(public_path('image/event'),$imageName);
            $filepath = 'image/event/'.$imageName;

        $fieldid = $request->fieldid;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $teamno = $request->teamno;
        $description = $request->description;
        $rules = $request->rulesandregulation;

        $event = new Event;
        $event->name = $name;
        $event->photo = $filepath;
        $event->startdate = $startdate;
        $event->enddate = $enddate;
        $event->teamno = $teamno;
        $event->description = $description;
        $event->rule = $rules;
        $event->pitch_id = $fieldid;
        $event->save();

        return redirect()->route('backside.event.index')->with("successMsg",'New Event is ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('backend.event.detail',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $pitches = Pitch::all();
        return view('backend.event.edit',compact('event','pitches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
                $newphoto = $request->photo;
                $oldPhoto = $request->oldPhoto;
        
                if ($request->hasFile('photo')) {
                   $imageName = time().'.'.$newphoto->extension();
                   $newphoto->move(public_path('image/event'),$imageName);
                   $filepath = 'image/event/'.$imageName;
                   if (\File::exists(public_path($oldPhoto))) {
                       \File::delete(public_path($oldPhoto));
                   }
               } else {
                   $filepath = $oldPhoto;
               }

               $fieldid = $request->fieldid;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $teamno = $request->teamno;
        $description = $request->description;
        $rules = $request->rulesandregulation;

        $event = Event::find($id);
        $event->name = $name;
        $event->photo = $filepath;
        $event->startdate = $startdate;
        $event->enddate = $enddate;
        $event->teamno = $teamno;
        $event->description = $description;
        $event->rule = $rules;
        $event->pitch_id = $fieldid;
        $event->save();

        return redirect()->route('backside.event.index')->with("successMsg",'New Event is UPDATE in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('backside.event.index')->with("successMsg",'New Event is DELETE in your data');
    }
}
