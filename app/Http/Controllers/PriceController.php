<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use Carbon;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('backend.price.list', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.price.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $price = $request->price;

        $Price = new Price();
        $Price->starttime = $starttime;
        $Price->endtime = $endtime;
        $Price->price = $price;
        $Price->save();

        return redirect()->route('backside.price.index')->with("successMsg", 'New Price is ADDED in your data');
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
        $price = Price::find($id);
        return view('backend.price.edit', compact('price'));
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
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $price = $request->price;

        $Price = Price::find($id);
        $Price->starttime = $starttime;
        $Price->endtime = $endtime;
        $Price->price = $price;
        $Price->save();

        return redirect()->route('backside.price.index')->with("successMsg", 'New Price is UPDATE in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        $price->delete();

        return redirect()->route('backside.price.index')->with("successMsg", 'New Price is DELETE in your data');
    }
}
