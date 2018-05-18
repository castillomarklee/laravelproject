<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Calendar;

// use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = DB::table('properties')
            ->join('propertydate', 'properties.uid', '=', 'propertydate.property_uid')
            ->select('properties.*', 'propertydate.*')
            ->get();

        return view('home')->with('scheduledate', response()
            ->json($schedule) );
    }

    public function getPropertiesDate() {
        $schedule = DB::table('properties')
            ->join('propertydate', 'properties.uid', '=', 'propertydate.property_uid')
            ->select('properties.*', 'propertydate.*')
            ->get();

        return response()->json($schedule);
    }

    

}
