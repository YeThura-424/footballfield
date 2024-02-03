<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stadium;
use App\Pitch;

class PitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pitches = Pitch::all();
        return view('backend.pitch.list',compact('pitches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stadiums = Stadium::all();
        return view('backend.pitch.new',compact('stadiums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:pitches'],
        ]);

        if ($validator) {
        $name = $request->name;
        $stadiumid = $request->stadiumid;
        $description = $request->description;
        $field_size = $request->pitch_size;

        //file upload
        if ($request->hasfile('images')) 
            {
                $i=1;
                foreach($request->file('images') as $image)
                {
                    $imagename = time().$i.'.'.$image->extension();
                    $image->move(public_path('image/pitch'), $imagename);  
                    $data[] = 'image/pitch/'.$imagename;
                    $i++;
                }
            }

        $pitch = new Pitch;
        $pitch->name = $name;
        $pitch->photo = json_encode($data);
        $pitch->description = $description;
        $pitch->field_size = $field_size;
        $pitch->stadia_id = $stadiumid;
        $pitch->save();

        return redirect()->route('backside.pitch.index')->with('successMsg','New Pitch is ADDED in your data');
        } else {
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $pitch = Pitch::find($id);
        return view('backend.pitch.detail',compact('pitch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pitch = Pitch::find($id);
        $stadia = Stadium::all();
        return view('backend.pitch.edit',compact('pitch','stadia'));
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
        //dd($request);

        $name = $request->name;
        $description = $request->description;
        $stadiumid = $request->stadiumid;

        if ($request->hasfile('images')) 
            {

                $i = 1;
                foreach($request->file('images') as $file)
                {
                    $Name = time().$i.'.'.$file->extension();
                    $file->move(public_path('image/pitch'), $Name);  
                    $data[] = 'image/pitch/'.$Name;
                    $i++;
                }

                foreach (json_decode($request->oldphoto) as $oldphoto){
                    if(\File::exists(public_path($oldphoto))){
                        \File::delete(public_path($oldphoto));
                    }
                }
            }else{
                $data = json_decode($request->oldphoto);
            }

            $pitch = Pitch::find($id);
            $pitch->name = $name;
            $pitch->photo = json_encode($data);
            $pitch->description = $description;
            $pitch->stadia_id = $stadiumid;
            $pitch->save();

            return redirect()->route('backside.pitch.index')->with('successMsg','New Pitch is UPDATE in your data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);

        $pitch = Pitch::find($id);
        $pitch->delete();

        return redirect()->route('backside.pitch.index')->with('successMsg','New Pitch is DELETE in your data');
    }
}
