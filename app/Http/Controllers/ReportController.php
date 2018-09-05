<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
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
        $statusBM= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->orderby('bookingrequest.status')
            ->get();
        return view('reports.status.bookingBM', ['statusBM'=>$statusBM]);



//        $report = DB::table('bookingrequest')
//        ->join('customer', 'customer.customerid', '=', 'customerid')
//        ->select('bookingrequest.date','bookingrequest.time', 'bookingrequest.status','bookingrequest.numofguests', 'customer.email')
//        ->get();
//        return view('reports/status/chart');
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
    public function show($chartstat)
    {
        return view('reports.status.bookingBM', ['chartStatus'=>$chartstat]);
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
