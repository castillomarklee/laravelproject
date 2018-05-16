<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Http\Controllers\Controller;
use DB;
class PropertiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getProperties = Property::orderBy('created_at', 'desc')->paginate(10);

        return view('property.propertyPage')->with('properties', $getProperties);
        //for reference
        //Property::all();
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
        // return "something";
        $validator = $request->validate([
            'listingName' => 'required',
            'agent' => 'required',
            'agentEmail' => 'required|email',
            'clientEmail' => 'required|email',
            'propertyAddress' => 'required',
            'facebook' => 'required | numeric',
            'twitter' => 'required | numeric',
            'instagram' => 'required | numeric',
        ]);
        // dd($request->input('facebook'));

        // $property = new Property;
        // dd($property);
        $uid = "BAP-" . date("m-d-Y") . "-" . rand(1, 1000);
        $listingname = $request->input('listingName');
        $agent = $request->input('agent');
        $agentemail = $request->input('agentEmail');
        $clientemail = $request->input('clientEmail');
        $propertyaddress = $request->input('propertyAddress');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $instagram = $request->input('instagram');

        $data = ['uid' => $uid,
        'listingname' => $listingname,
        'agent' =>$agent,
        'agentemail'=> $agentemail,        
        'clientemail' =>$clientemail,
        'propertyaddress' =>$propertyaddress,
        'facebook' =>$facebook,
        'twitter' =>$twitter,
        'instagram' =>$instagram,
        'created_at' => new \DateTime(),
        'updated_at' => new \DateTime()];

        $saveProperty = DB::table('properties')->insert($data);

        $savePropertyMessage = '';
        
        if($saveProperty == true) {
            $savePropertyMessage = view('property.propertyFormStatus')->with(['message' => 'Property has been saved']);
        } else {
            $savePropertyMessage = view('property.propertyFormStatus')->with(['message' => 'Property has not been saved']);
        }

        return $savePropertyMessage;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('properties')->where('uid', $id)->get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $property = DB::table('property')->where('uid')->get();
        return $property;
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
        return $request;
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

    public function editForm($uid) {
        $data = DB::table('properties')->where('uid', $uid)->get();
        return view('property.propertyEdit')->with(['propertiesData'=>  $data ]);
    }

    public function editSubmit(Request $request, $id) {

        $validator = $request->validate([
            'listingName' => 'required',
            'agent' => 'required',
            'agentEmail' => 'required|email',
            'clientEmail' => 'required|email',
            'propertyAddress' => 'required',
            'facebook' => 'required | numeric',
            'twitter' => 'required | numeric',
            'instagram' => 'required | numeric',
        ]);



       $updateProperties = DB::table('properties')
            ->where('id', $id)
            ->update(['listingname' => $request->input('listingName'), 'agent' => $request->input('agent'), 'agentemail' => $request->input('agentEmail'), 'clientemail' => $request->input('clientEmail'), 'propertyaddress' => $request->input('propertyAddress'), 'facebook' => $request->input('facebook'), 'twitter' => $request->input('twitter'), 'instagram' => $request->input('instagram')]);

        $updatePropertiesMessage = '';

        $data = DB::table('properties')->where('id', $id)->get();

        if($updateProperties == 1) {
            $updatePropertiesMessage = view('property.propertyFormStatus')->with(['message' => 'Property has been updated']);
        } else {
            $updatePropertiesMessage = view('property.propertyFormStatus')->with(['message' => 'Property has not been updated']);
        }
 
        return $updatePropertiesMessage;

    }

    public function deleteProperties(Request $request, $id) {
        $deleteProperty = DB::table('properties')->where('uid', $id)->delete();

        return $deleteProperty;
    }

}
