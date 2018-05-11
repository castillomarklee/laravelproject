<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('property.propertyPage');
        //for reference
        // Property::all();
        //Property::where('listingname', 'sample name')->get;
        //Property::orderBy('listingname', 'desc')->take(1)->get();
        //Property::orderBy('listingname', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('property.propertyCreate');

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
            'listingName' => 'require',
            'agent' => 'require',
            'agentEmail' => 'require|email',
            'clientEmail' => 'require|email',
            'propertyAddress' => 'require',
            'facebook' => 'require|number',
            'twitter' => 'require|number',
            'instagram' => 'require|number',
        ]);

        $property = new Property;
        $property->uid = "BAP-" . date("m-d-Y") . "-" . rand(1, 1000);
        $property->listingname = $request->input('listingName');
        $property->agent = $request->input('agent');
        $property->agentemail = $request->input('agentEmail');
        $property->clientemail = $request->input('clientEmail');
        $property->propertyaddress = $request->input('propertyAddress');
        $porperty->facebook = $request->input('facebook');
        $property->twitter = $request->input('twitter');
        $property->instagram = $request->input('instagram');

        $property->save();
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
        //
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
        //
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
