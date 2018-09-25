<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use DB;

class faqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $question=DB::table('frequently_asked_question')
            ->select('frequently_asked_question.question', 'frequently_asked_question.answer')
            ->where('frequently_asked_question.platform', '=', 'W')
            ->orderby('frequently_asked_question.question')
            ->get();
        return view('FAQ.questions',['question'=>$question]);
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
