<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //pdf
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
        $from = "";
        $to = "";

        $userId = Auth::id();
        $statusBM= DB::table('bookingrequest')
            ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
            ->where('bookingrequest.restaurantid','=',$userId)
            ->orderby('bookingrequest.status', 'bookingrequest.date')
            ->get();
        return view('reports.status.bookingBM',compact('statusBM','from','to'));
    }

    public function fun_pdf()
    {
        $pdf = PDF::loadView('reports.status.test'); //file path to pdf you want to print
        return $pdf->download('report.pdf'); //the name of the file you want to print
    }

    public function piechart()
    {
        $data= DB::table('bookingrequest')
            ->select(
                DB::raw('status as status'),
                DB::raw('count(*) as number'))
            ->groupBy('status')
            ->get();
        $user =array();
        foreach($data as $value)
        {
            $user[$value->status] = (int)$value->number;
        }
        return view('chart',compact('user'));
    }

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

    public function report(Request $request)
    {
        $from = Carbon::parse($request->calendar1);
        $to = Carbon::parse($request->calendar2);
        if ($from < $to)
        {
            $userId = Auth::id();
            $statusBM= DB::table('bookingrequest')
                ->select('bookingrequest.status', 'bookingrequest.date', 'bookingrequest.time', 'bookingrequest.numofguests', 'bookingrequest.customerid')
                ->where('bookingrequest.restaurantid','=',$userId)
                ->wherebetween('date', [Carbon::parse($request->calendar1), Carbon::parse($request->calendar2)])
                ->orderby('bookingrequest.status', 'bookingrequest.date')
                ->get();
            return view('reports.status.bookingBM',compact('statusBM','from','to'));
        }
        else{
            return redirect('/reportbymonth')->with('message','Select a valid date range');
        }

    }

    public function show($reportbymonth)
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

    public function destroy($id)
    {
        //
    }
}
