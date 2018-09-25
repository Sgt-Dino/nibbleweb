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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            ->where('bookingrequest.accepted','=','Y')
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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

    public function destroy($id)
    {
        //
    }
}
