<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
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
        //12-06
        /*
        $foods = DB::table('menuitem')
            ->join('menucategory', 'menucategory.menucategoryid', '=', 'menuitem.menucategoryid')
            ->select('menuitem.itemname', 'menucategory.name', 'menuitem.itemprice')
            ->get();
        
        return view('menu.food', ['foods'=>$foods]);
        */
        $userId = Auth::id();
        $category= DB::table('menucategory')
            ->select('*')
            ->where('menucategory.restaurantid','=',$userId)
            ->where('menucategory.active','=','Y')
            ->get();
         //$category = Category::all();
         return view('menu.category',compact('category'));
         

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('menu.categorycreate');
    
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
        Category::create($request->all());
        $request->restaurantid = Auth::id();
        return redirect('/category')->with('message','Category has been succesfully added');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$food = Food::findOrFail($id);
    }

    public function getSingleCat($id)
    {
        $category = Category::findOrFail($id);
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
        $cat = Category::findOrFail(Crypt::decrypt($id));
        return view('menu.categoryedit',compact('cat'));
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
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->active = $request->get('active');
        $category->save();
        return redirect('/category')->with('message','Category has been successfully updated');

        
    }

    public function updateRemove(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->active = 'N';
        $category->save();
        return redirect('/category')->with('message','Category has been successfully removed');

        
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
