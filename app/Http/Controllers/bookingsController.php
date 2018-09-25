<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\BookingRequest;

class bookingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {      
        $today = date("Y-m-d"); 
        //$nextweek = date("Y-m-d")->addDays(7);
        $nextweek = date("Y-m-d", strtotime("+1 week"));
        $userId = Auth::id();
        $bookingVar= DB::table('bookingrequest')
            ->join('customer', 'customer.customerid', '=', 'bookingrequest.customerid')
            ->select('bookingrequest.bookingrequestid','bookingrequest.date','bookingrequest.time','customer.firstname', 'customer.phone', 'bookingrequest.numofguests', 'bookingrequest.status','bookingrequest.accepted', 'bookingrequest.comment')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->where('bookingrequest.accepted','=','P')
            ->where('bookingrequest.status','<>','N')
            ->ORDERBY('bookingrequest.date', 'ASC')
            ->orderby('bookingrequest.time', 'ASC')
            ->get();
            $bookingD= DB::table('bookingrequest')
            ->join('customer', 'customer.customerid', '=', 'bookingrequest.customerid')
            ->select('bookingrequest.bookingrequestid','bookingrequest.date','bookingrequest.time','customer.firstname', 'customer.phone', 'bookingrequest.numofguests', 'bookingrequest.status','bookingrequest.accepted')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->where('bookingrequest.accepted','=','N')
            ->wherebetween('date', [$today, $nextweek])
            ->ORDERBY('bookingrequest.date', 'ASC')
            ->orderby('bookingrequest.time', 'ASC')
            ->get();
            $bookingA= DB::table('bookingrequest')
            ->join('customer', 'customer.customerid', '=', 'bookingrequest.customerid')
            ->select('bookingrequest.bookingrequestid','bookingrequest.date','bookingrequest.time','customer.firstname', 'customer.phone', 'bookingrequest.numofguests', 'bookingrequest.status','bookingrequest.accepted')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->where('bookingrequest.accepted','=','Y')
            ->wherebetween('date', [$today, $nextweek])
            ->ORDERBY('bookingrequest.date', 'ASC')
            ->orderby('bookingrequest.time', 'ASC')
            ->get();
        return view('bookings.index', ['bookingVar'=>$bookingVar,'bookingD'=>$bookingD,'bookingA'=>$bookingA]);
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

    public function update(BookingRequest $request, $id)
    {
        $bookingVar = Bookings::findOrFail($id);

        $bookingVar->status = $request->get('status');
        $bookingVar->accepted = $request->get('accepted');
        $bookingVar->save();
        return redirect('/bookings')->with('message','Booking Request has been updated successfully');
    }
    public function updateA(BookingRequest $request, $id)
    {
        $bookingVar = Bookings::findOrFail($id);
        $bookingVar->accepted = 'Y';
        $bookingVar->status = $bookingVar->status;      
        $bookingVar->save();
        return redirect('/booking')->with('message','Booking Request has been accepted');
    }
    public function updateD(BookingRequest $request, $id)
    {
        
        $bookingVar = Bookings::findOrFail($id);
        $bookingVar->accepted = 'N';
        $bookingVar->status = $bookingVar->status;       
        $bookingVar->save();
        return redirect('/booking')->with('message','Booking Request has been declined successfully');
    }

    public function destroy($id)
    {
        //
    }
}
