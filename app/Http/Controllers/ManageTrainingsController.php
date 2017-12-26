<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\TrainingList;
use App\TrainingRequest;
use App\ManageTraining;
use App\User;
use DB;

class ManageTrainingsController extends Controller
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
        $trainingrequests = DB::table('Training_Requests')
            //->where('user_id', '<>', auth()->user()->id)
            ->orderBy('status', 'asc')
            ->orderBy('requestId', 'asc')
            ->orderBy('trainingId', 'asc')
            ->get();

        //$trainingrequests = ManageTraining::orderBy('trainingName', 'asc')->paginate(10);

        return view('dashboardmanager')->with('trainingrequests', $trainingrequests);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'requestId' => 'required',
        ]);

        DB::table('Training_Requests')
        ->where('requestId', $request->input('requestId'))
        ->update(['status' => $request->input('status')]);     
        
        //Create Post
        /*
        $trainingrequest = TrainingRequest::find($id);
       
        
        $trainingrequest = new TrainingRequest;
        $trainingrequest->trainingId = $request->input('trainingId');
        $trainingrequest->trainingName = $request->input('trainingName');
        $trainingrequest->reason = $request->input('reason');
        $trainingrequest->user_id = auth()->user()->id;
        $trainingrequest->status=$request->input('status');
        $trainingrequest->save();
        */

        return redirect('/dashboardmanager')->with('success', 'Training Updated');
    }
}
