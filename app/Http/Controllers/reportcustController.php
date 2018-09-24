<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use Auth;
use DB, Session, Crypt, Hash;
use PDF;

class reportcustController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cust=DB::table('bookingrequest')
            ->join('customer', 'bookingrequest.customerid', '=', 'customer.customerid')
            ->select('bookingrequest.status', 'bookingrequest.date','customer.firstname')
            ->where('bookingrequest.status', '=' , 'P')
            ->orderby('bookingrequest.date')
            //->limit(10)
            ->get();
        return view('reports.customer.pendingCustomer',['cust' =>$cust]);
    }

    public function statDecline()
    {
        $missed=DB::table('bookingrequest')
            ->join('customer', 'bookingrequest.customerid', '=', 'customer.customerid')
            ->select('bookingrequest.status', 'bookingrequest.date','customer.firstname')
            ->where('bookingrequest.status', '=' , 'M')
            ->orderby('bookingrequest.date')
            ->get();
        return view('reports.customer.customermissed',['missed' =>$missed]);
    }

    public function statCheckedin()
    {
        $check=DB::table('bookingrequest')
            ->join('customer', 'bookingrequest.customerid', '=', 'customer.customerid')
            ->select('bookingrequest.status', 'bookingrequest.date','customer.firstname')
            ->where('bookingrequest.status', '=' , 'C')
            ->orderby('bookingrequest.date')
            ->get();
        return view('reports.customer.customercheckedin',['check' =>$check]);
    }

    public function loadpdf($cust)
    {
        $pdf = PDF::loadView('reports.customer.pendingCustomer', ['cust' =>$cust]); //file path to pdf you want to print
        return $pdf->download('customerReport.pdf'); //the name of the file you want to print
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

    public function destroy($id)
    {
        //
    }
}
