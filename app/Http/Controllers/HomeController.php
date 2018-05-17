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

        // $schedules = DB::table('properties')
        //     ->join('propertydate', 'properties.uid', '=', 'propertydate.property_uid')
        //     ->select('properties.*', 'propertydate.*')
        //     ->get();
        
        // $event_list = [];

        // foreach ($schedules as $key => $schedule) {
        //     $event_list[] = Calendar::event(

        //         $schedule->social_medianame,
        //         true,
        //         new \DateTime($schedule->start_date),
        //         new \DateTime($schedule->end_date)
        //     );

        //     $calendar_details = Calendar::addEvents($event_list);
        // }

        return view('home');
    }

    

}
