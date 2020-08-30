<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //dd($id);
        $user = User::find($id);
        return view('frontend.profile',compact('user'));
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

        $name = $request->username;
        $oldimage = $request->oldimage;
        $newimage = $request->image;

        if ($request->hasFile('image')) {
           $imageName = time().'.'.$newimage->extension();
           $newimage->move(public_path('image/user'),$imageName);
           $filepath = 'image/user/'.$imageName;
           
        
       } else {
           $filepath = $oldimage;
       }

       $email = $request->email;
       $phone = $request->phone;
       $address = $request->address;

       $user = User::find($id);
       $user->name = $name;
       $user->profile = $filepath;
       $user->email = $email;
       $user->phone = $phone;
       $user->address = $address;
       $user->save();

       return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
