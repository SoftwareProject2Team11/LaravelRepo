<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\TrainingList;
use App\TrainingRequest;
use App\ManageTraining;
use App\keyCode;
use App\User;
use DB;

class keyCodeForManController extends Controller
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

        return view('keyCodeForMan', compact('userId'));
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
            'keyCode' => 'required',
        ]);

        $requestKeyCode = $request->input('keyCode');

        $keyCodes = DB::table('KeyCodes')->where('used', 0)->get();

        foreach ($keyCodes as $key) {
            $keyCode = $key->keyCode;
               
            if ($requestKeyCode == $keyCode){
                DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->update(['manager' => 1]); 

                DB::table('KeyCodes')
                    ->where('keyCode', $keyCode)
                    ->update(['used' => 1]);    

                //$trainingrequests = TrainingRequest::orderBy('trainingName', 'asc')->paginate(10);
                //return view('dashboardmanager')->with('trainingrequests', $trainingrequests); 
            }
        }

        return redirect('/keyCodeForMan');
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