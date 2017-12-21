<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Mail\ReminderMail;
use Illuminate\Support\Facades\Mail;
use DateTime;
use App\TrainingRequest;
use App\User;
use DB;

class TrainingRequestsController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $trainingrequests = $user->trainingrequests;

        return view('trainingrequests.create', compact('trainingrequests'));
        //return view('traininglist.show', compact('trainingrequests'));          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainingrequests.create');
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
            'trainingId' => 'required',
            //'trainingName' => 'required',
            'reason' => 'required'
        ]);

        //Request a Training

        $saveReason = htmlspecialchars($request->input('reason'));
        
        $trainingrequest = new TrainingRequest;
        $trainingrequest->trainingId = $request->input('trainingId');
        //$trainingrequest->trainingName = $request->input('trainingName');
        $trainingrequest->reason = $saveReason;
        $trainingrequest->user_id = auth()->user()->id;
        $trainingrequest->status=1;
        $trainingrequest->save();

        //mail logic

            $requestId = DB::table('Training_Requests')
            ->max('requestId');

            //Get email van user
            $UserId = DB::table('Training_Requests')
            ->select('user_Id')
            ->where('requestId', (int)$requestId)
            ->get();

            $UserId = substr($UserId, 12, -2);

            $emailOfUser = DB::table('users')
            ->select('email')
            ->where('id', (int)$UserId)
            ->get();

            $emailOfUser = substr($emailOfUser, 11, -3);


            //Date van training ophalen
            $IdOfTraining = DB::table('Training_Requests')
            ->select('trainingId')
            ->where('requestId', $requestId)
            ->get();

            $IdOfTraining = substr($IdOfTraining, 15, -2);

            $DateOfTraining = DB::table('Training')
            ->select('startDate')
            ->where('trainingId', (int)$IdOfTraining)
            ->get();

            $DateOfTraining = substr($DateOfTraining, 15, -3);

            $DateOfTraining = new DateTime($DateOfTraining);

            //Date van vandaag (nu) nemen
            $Today = substr(Carbon::now()->addHours(1), 0);

            $Today = new DateTime($Today);

            //verschill tussen vandaag en date training bepalen
            $interval = $Today->diff($DateOfTraining);

            $interval = $interval->format('%d');


            //bepalen wanneer mail verstuurt moet worden
            $when = Carbon::now()->addDays((int)$interval);

            //echo "$when<br/>";
            
            //mail in jobs table plaatsen en versturen wanneer training volgende dag is
            Mail::to($emailOfUser)
                ->later($when, new ReminderMail());

        return redirect('/dashboard')->with('success', 'Your training has been requested ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //$training = Training::find($id);
       //return view('trainings.show')->with('training', $training);
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
    public function destroy($requestId)
    {
        //$trainingrequest = TrainingRequest::find($trainingId)

        DB::table('Training_Requests')
        ->where('requestId', $requestId)
        ->delete();

        return redirect('/dashboard')->with('success', 'Training request cancelled');

        
                //if(auth()->user()->id!==$trainingrequest->user_id) 
                //{
                //    return redirect('/dashboard')->with('error', 'Unauthorized Page!');
                //}
        
                //$trainingrequest->delete();
                //return redirect('/dashboard')->with('success', 'Training request cancelled');
    }
}
