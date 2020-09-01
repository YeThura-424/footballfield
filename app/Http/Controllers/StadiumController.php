<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stadium;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiums = Stadium::all();
        return view('backend.stadium.list', compact('stadiums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.stadium.new');
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
            'name' => ['required', 'string', 'max:255', 'unique:stadia'],
            'photo' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($validator) {
            $name = $request->name;
            $photo = $request->photo;


            $imageName = time() . '.' . $photo->extension();
            $photo->move(public_path('image/stadium'), $imageName);
            $filepath = 'image/stadium/' . $imageName;

            $stadium = new Stadium;
            $stadium->name = $name;
            $stadium->photo = $filepath;
            $stadium->save();

            return redirect()->route('backside.stadium.index')->with("successMsg", 'New Stadium is ADDED in your data');
        } else {
            return redirect::back()->withErrors($validator);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $stadium = Stadium::find($id);
        return view('backend.stadium.edit', compact('stadium'));
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

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        if ($validator) {
            $name = $request->name;
            $newphoto = $request->photo;
            $oldPhoto = $request->oldPhoto;

            if ($request->hasFile('photo')) {
                $imageName = time() . '.' . $newphoto->extension();
                $newphoto->move(public_path('image/stadium'), $imageName);
                $filepath = 'image/stadium/' . $imageName;
                if (\File::exists(public_path($oldPhoto))) {
                    \File::delete(public_path($oldPhoto));
                }
            } else {
                $filepath = $oldPhoto;
            }

            $stadium = Stadium::find($id);
            $stadium->name = $name;
            $stadium->photo = $filepath;
            $stadium->save();

            return redirect()->route('backside.stadium.index')->with('successMsg', 'Existing Stadium is UPDATED in your data');
        } else {
            return redirect::back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $stadium = Stadium::find($id);
        $stadium->delete();

        return redirect()->route('backside.stadium.index')->with('successMsg', 'Existing Stadium is DELETED in your data');
    }
}
