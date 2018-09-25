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
        $userId = Auth::id();
        $rating ="All";
        $reviews= DB::table('review')
            ->join('restaurant', 'restaurant.restaurantid', '=', 'review.restaurantid')
            ->select('review.rating', 'review.date', 'review.comment')
            ->where('review.restaurantid', '=', $userId)
            ->orderby('review.rating', 'review.date')
            ->get();
        return view('reports.reviews', compact('reviews', 'rating'));
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

    public function ratingchange($id)
    {
        $userId = Auth::id();
        $reviews= DB::table('review')
            ->join('restaurant', 'restaurant.restaurantid', '=', 'review.restaurantid')
            ->select('review.rating', 'review.date', 'review.comment')
            ->where('review.rating', '=', $id)
            ->where('review.restaurantid', '=', $userId)
            ->orderby('review.rating', 'review.date')
            ->get();
            $rating =$id;
        return view('reports.reviews', compact('reviews', 'rating'));
    }
}
