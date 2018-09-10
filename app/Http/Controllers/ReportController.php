<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //MUST UNDO!!!
        $userId = Auth::id();
        $statusBM= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->where('bookingrequest.restaurantid','=',$userId)
//            ->wherebetween('date', 'startDate', 'endDate')
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.bookingBM', ['statusBM'=>$statusBM]);
    }

//    public function getBookingReport()
//    {
//        $statusBM=bookingrequest::orderBy('status')->lists('status', 'date', 'time', 'numofguests', 'customerid');
//        return  view ('reports.status.bookingBM');
//    }

//    public function getBookingReport()
//    {
//        $statusBM =bookingrequest::orderBy('date');
//        return view(reports.status.chart);
//    }
//
//    public function exportStudentInfo
//    {
//        if ($request->ajax())
//        {
//            $userId = Auth::id();
//            $status=bookingrequest::table('bookingrequest')
//                ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
//                ->where('bookingrequest.restaurantid', '=', $userId)
//                ->wherebetween('date', $(#startdate), ()#endate)
//                ->orderby('bookingrequest.status')
//                ->get();
//        }
//    }

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
    public function show($request)
    {
        $userId = Auth::id();
        $request= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->wherebetween('date', 'startDate', 'endDate')
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.char', 'request');
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
