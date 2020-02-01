<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retailer;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retailers = Retailer::all();
        return view('retailer', compact(['retailers']));
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
        $retailer = new Retailer();
        $retailer->name = $request->name;
        $retailer->description = $request->description;
        $retailer->website = $request->website;
        $path =$request->file('logo')->store('images', 'public');
        $retailer->logo = $path;
        
        if($retailer->save())
        {
            return redirect('/retailer');
        }else
        {
            
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
        $reta = Retailer::find($id);
        if(isset($reta)) {
            return view('editretailer',compact('reta'));
        }
        return redirect('/retailer');
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
        $reta = Retailer::find($id);
        if(isset($reta)) {
            $reta->name = $request->name;
            $reta->description = $request->description;
            $reta->website = $request->website;
            if($request->file('logo') != null) {
                $path =$request->file('logo')->store('images', 'public');
                $reta->logo = $path;
            }
            $reta->save();
               
        }
        return redirect('/retailer');
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
