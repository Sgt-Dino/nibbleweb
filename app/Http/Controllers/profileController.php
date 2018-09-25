<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;
use Auth;

class ProfileController extends Controller
{
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
        return view('profile.show',compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.profile',compact('profile'));
    }

    public function update(Request $request, $id)
    {

        $profile = Profile::findOrFail($id);

        $profile->restaurantname = $request->get('restaurantname');
        $profile->phone = $request->get('phone');
        $profile->restauranttype = $request->get('restauranttype');
        if($request->get('gpslocation') <> "")
        {
            $profile->gpslocation = $request->get('gpslocation');
        }
        $profile->email = $request->get('email');
        $profile->suburbid = $request->get('suburbid');
        $profile->addressline1 = $request->get('addressline1');
        $profile->addressline2 = $request->get('addressline2');
        $profile->opentime = $request->get('opentime');
        $profile->closetime = $request->get('closetime');
        $profile->websiteurl = $request->get('websiteurl');
        $profile->save();
        return redirect('/profile')->with('message','item has been updated successfully');

        
    }

    public function destroy($id)
    {
        //
    }
}
