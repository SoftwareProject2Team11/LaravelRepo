<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\TrainingList;
use App\TrainingRequest;
use App\User;
use DB;

class surveyListController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = auth()->user()->id;

        $trainings = DB::table('Training_Requests')
        ->where([
                ['user_id', '=', $userId],
                ['status', '=', 2],
            ])
        ->get();

        //$trainingId = $trainings->trainingId;

        //$questions = DB::table('Question')
        //->where('trainingId', $trainingId)
        //->get();

        return view('survey.index', compact('trainings'));
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
        $this->validate($request, [
            'questionId' => 'required',
            //'answer' => 'required',
        ]);


        //save answer
        
        //$saveAnswer = htmlspecialchars($request->input('answer'))

        DB::table('Answer')->insert(
            ['questionId' => $request->input('questionId'), 'answer' => htmlspecialchars($request->input('answer')), 'userId' => auth()->user()->id]
        );
        

        return redirect('/survey')->with('success', 'Thank you for your answer!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainings = TrainingList::find($id);
        return view('survey.show')->with('trainings', $trainings);
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