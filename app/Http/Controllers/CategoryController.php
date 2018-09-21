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
        $userId = Auth::id();
        $category= DB::table('menucategory')
            ->select('*')
            ->where('menucategory.restaurantid','=',$userId)
            ->where('menucategory.active','=','Y')
            ->get();
        $deleted= DB::table('menucategory')
            ->select('*')
            ->where('menucategory.restaurantid','=',$userId)
            ->where('menucategory.active','=','N')
            ->get();
         //$category = Category::all();
         return view('menu.category',compact('category','deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create a new category
        return view('menu.categorycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Save category
    public function store(Request $request)
    {
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
    //Sends to upadte page
    public function edit($id)
    {
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

    //Update Category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->active = $request->get('active');
        $category->save();
        return redirect('/category')->with('message','Category has been successfully updated');

        
    }

    //Delete by changing active field
    public function updateRemove(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->active = 'N';
        $category->save();
        return redirect('/category')->with('message','Category has been successfully removed');       
    }

    //Retrieve deleted item
    public function updateRetrieve(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->active = 'Y';
        $category->save();
        return redirect('/category')->with('message','Category has been successfully retrieved');       
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
