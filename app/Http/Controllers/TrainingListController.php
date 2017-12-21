<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\TrainingList;
use App\TrainingRequest;
use App\User;
use DB;

class TrainingListController extends Controller
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
        //$traininglists = TrainingList::orderBy('trainingName', 'asc')->paginate(10);

        $Today = Carbon::now()->addHours(1);

        $traininglists = DB::table('Training')
        ->where('startDate', '>', $Today)
        ->orderBy('trainingName', 'asc')
        ->get();

        return view('traininglist.index')->with('traininglists', $traininglists);
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
            'reason' => 'required',
            'trainingId' => 'required'
        ]);


        //Request a Training
        
        $trainingrequest = new TrainingRequest;

        $trainingrequest->trainingId = $request->input('trainingId');
        //$trainingrequest->trainingName = "";
        $trainingrequest->reason = $request->input('reason');
        $trainingrequest->user_id = auth()->user()->id;
        $trainingrequest->status=0;
        $trainingrequest->save();

        return redirect('/dashboard')->with('success', 'Your training has been requested');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $traininglist = TrainingList::find($id);
        return view('traininglist.show')->with('traininglist', $traininglist);
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
