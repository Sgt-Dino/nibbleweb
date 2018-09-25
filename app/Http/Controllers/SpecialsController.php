<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Specials;
use App\SpecialDay;
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
            $SpecialidTable= DB::table('special')           
            ->select('specialid')
            ->from('special')
            ->ORDERBY('specialid', 'ASC')
            ->ORDERBY('specialid', 'LIMIT 1')
            ->get();
foreach($SpecialidTable as $s)
{
    $specialid = $s->specialid;
}

    if (Input::get('monday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '2', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('tuesday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '3', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('wednesday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '4', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('thursday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '5', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('friday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '6', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('saterday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '7', 'specialid' => $specialid]
        );
    
    }
    if (Input::get('sunday') === '1')
    {
        $id = DB::table('specialday')->insertGetId(
        ['dayid' => '1', 'specialid' => $specialid]
        );
    
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
