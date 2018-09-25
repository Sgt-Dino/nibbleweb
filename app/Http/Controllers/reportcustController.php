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
        $userId = Auth::id();
        $status = "All";
        $cust=DB::table('bookingrequest')
            ->join('customer', 'bookingrequest.customerid', '=', 'customer.customerid')
            ->select('bookingrequest.status', 'bookingrequest.numofguests', 'bookingrequest.date','customer.firstname')
            ->where('bookingrequest.restaurantid', '=' ,$userId)
            ->orderby('bookingrequest.date')
            //->limit(10)
            ->get();
        return view('reports.customer.pendingCustomer',compact('cust','status'));
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

    public function statuschange($id)
    {
        $userId = Auth::id();
        $cust=DB::table('bookingrequest')
            ->join('customer', 'bookingrequest.customerid', '=', 'customer.customerid')
            ->select('bookingrequest.status', 'bookingrequest.numofguests', 'bookingrequest.date','customer.firstname')
            ->where('bookingrequest.status', '=' , $id)
            ->where('bookingrequest.restaurantid', '=' ,$userId)
            ->orderby('bookingrequest.date')
            //->limit(10)
            ->get();
            $status = $id;
        return view('reports.customer.pendingCustomer',compact('cust','status'));

    }
}
