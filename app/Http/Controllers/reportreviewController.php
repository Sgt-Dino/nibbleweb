<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //pdf
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Redirect;
use PDF;//pdf

class reportreviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reviews= DB::table('review')
            ->select('review.rating', 'review.date', 'review.comment')
            ->orderby('review.rating', 'review.date')
            ->get();
        return view('reports.reviews', ['reviews'=>$reviews]);
    }

    public function fun_pdf($reviews)
    {
        $pdf = PDF::loadView('reports.reviews', ['reviews'=>$reviews]); //file path to pdf you want to print
        return $pdf->download('review.pdf'); //the name of the file you want to print
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
