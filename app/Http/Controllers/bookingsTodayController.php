<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\BookingRequest;

class bookingsTodayController extends Controller
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
        $userId = Auth::id();     
        $todayDate = date("Y-m-d");
        $bookingTodayVar= DB::table('bookingrequest')
            ->join('customer', 'customer.customerid', '=', 'bookingrequest.customerid')
            ->select('bookingrequest.bookingrequestid','bookingrequest.time','customer.firstname', 'customer.phone', 'bookingrequest.numofguests', 'bookingrequest.status','bookingrequest.accepted')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->where('bookingrequest.date','=',$todayDate)
            ->where('bookingrequest.status','<>','N')
            ->where('bookingrequest.status','<>','C')
            ->where('bookingrequest.status','<>','M')
            ->ORDERBY('bookingrequest.time', 'ASC')
            ->get();
            $bookingsCanceled= DB::table('bookingrequest')
            ->join('customer', 'customer.customerid', '=', 'bookingrequest.customerid')
            ->select('bookingrequest.bookingrequestid','bookingrequest.time','customer.firstname', 'customer.phone', 'bookingrequest.numofguests', 'bookingrequest.status','bookingrequest.accepted')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->where('bookingrequest.date','=',$todayDate)
            ->where('bookingrequest.status','=','N')
            ->ORDERBY('bookingrequest.time', 'ASC')
            ->get();
        return view('home', ['bookingTodayVar'=>$bookingTodayVar,'bookingsCanceled'=>$bookingsCanceled]);
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
    public function updateC(BookingRequest $request, $id)
    {
        $bookingVar = Bookings::findOrFail($id);
        $bookingVar->accepted = $bookingVar->accepted;
        $bookingVar->status = 'C';      
        $bookingVar->save();
        return redirect('/home')->with('message','Customer has been checked in');
    }
    public function updateM(BookingRequest $request, $id)
    {
        $bookingVar = Bookings::findOrFail($id);
        $bookingVar->accepted = $bookingVar->accepted;
        $bookingVar->status = 'M';      
        $bookingVar->save();
        return redirect('/home')->with('message','Booking Request has been updated successfully');
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
