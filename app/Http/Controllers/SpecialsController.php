<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Specials;
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;

class SpecialsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.specials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        return view('menu.specialscreate');

    
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
        $start = $request->startdate;
        $end = $request->enddate;
        if ($start < $end)
        {           
            Specials::create($request->all());

            //call special id wat nounet create is
            $SpecialidTable= DB::table('specials')           
            ->select('specialid')
            ->from('specials')
            ->ORDERBY('specialid', 'DESC')
            ->ORDERBY('specialid', 'LIMIT 1')
            ->get();

            $count = 0;
            $array  = array($request->day1, $request->day2, $request->day3, $request->day4, $request->day5, $request->day6, $request->day7); 
            foreach($array as $day)
            {
                $count = $count+1;
                if($day = "1")
                {
                    //SpecialDay::create($request->all());
                    //$dayid = $count
                    //$specialid = $SpecialidTable->specialid(1);
                }
                else
                if($day = "0")
                {
                    //nothing
                }
                
            }

            return redirect('/specials')->with('message','Special has been succesfully created');
        }
        else{
            return redirect('/specials/create?')->with('message','Select a valid date range');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
