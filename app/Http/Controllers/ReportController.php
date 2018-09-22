<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller; //pdf
use App\Bookings;
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Redirect;
use PDF;//pdf
use Carbon\Carbon;

class ReportController extends Controller
{

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
            //->wherebetween('date', ['#startDate', '#endDate'])
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.bookingBM', ['statusBM'=>$statusBM]);
    }

    public function fun_pdf()
    {
        $pdf = PDF::loadView('reports.status.bookingBM'); //file path to pdf you want to print
        return $pdf->download('reports.pdf');
    }

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
        $start = $request->startdate;
        $end = $request->enddate;
        if ($start < $end)
        {
            $userId = Auth::id();
            $request= DB::table('bookingrequest')
                ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
                ->where('bookingrequest.restaurantid','=',$userId)
                ->wherebetween('date', ['startdate', 'enddate'])
                ->orderby('bookingrequest.status')
                ->get();
            return view('reports.status.bookingBM', ['Request'=>$request]);
        }
        else
        {
            return redirect('/reportbymonth')->with('message','Select a valid date range');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
       
        $userId = Auth::id();
        $statusBM= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->wherebetween('date', [Carbon::parse($request->calendar1), Carbon::parse($request->calendar2)])
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.bookingBM', ['statusBM'=>$statusBM]);
    }

    public function show($reportbymonth)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $userId = Auth::id();
        $statusBM= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->wherebetween('date', [$startdate, $enddate])
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.bookingBM', ['statusBM'=>$statusBM]);
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
