<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;
use Auth;

class ProfileController extends Controller
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
        $userId = Auth::id();
         $profiles = Profile::all()->where('restaurantid','=',$userId);
         $subs = DB::select('select * from suburb');
         return view('Profile.profile',compact('profiles','subs'));
         //return view('menu.food',compact('profiles'));
         

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
    public function show($id)
    {
        return view('profile.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.profile',compact('profile'));
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

        $profile = Profile::findOrFail($id);

        $profile->restaurantname = $request->get('restaurantname');
        $profile->phone = $request->get('phone');
        $profile->restauranttype = $request->get('restauranttype');
        $profile->gpslocation = $request->get('gpslocation');
        $profile->email = $request->get('email');
        $profile->suburbid = $request->get('suburbid');
        $profile->addressline1 = $request->get('addressline1');
        $profile->addressline2 = $request->get('addressline2');
        $profile->websiteurl = $request->get('websiteurl');
        $profile->save();
        return redirect('/profile')->with('message','item has been updated successfully');

        
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
