<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Freelance_apply;
use Session;
use Redirect;

class Apply extends Controller
{
    //
    public function getWorkData(Request $request){
        $userid = Auth::id();
        $work_details = DB::table('work')->get();
        return view('apply')->with(compact('work_details'));
    }

    public function postWorkData(Request $request){
        $userid = Auth::id();
        $user_details = DB::table('users')->where('id',$userid)->get();

        $work_id = $request->work_id;
        $description = $request->description;
        $work = $request->work;
        $company_name = $request->company_name;
        $deadline = $request->deadline;
        $budget = $request->budget;

        $work_details = array('work_id'=>$work_id,'description'=>$description,'work'=>$work,'company_name'=>$company_name,'deadline'=>$deadline,'budget'=>$budget);
        return view('apply2',compact('work_details','user_details'));
    }

    public function freeWork(Request $request){
        $userid = Auth::id();
        $work_details = DB::table('work')->get();

        $work_id = $request->work_id;
        $est_amount = $request->est_amount;
        $exp_year = $request->exp_year;
        
        $freelance_apply = new Freelance_apply();
        $freelance_apply->work_id = $work_id;
        $freelance_apply->user_id = $userid;
        $freelance_apply->est_amount = $est_amount;
        $freelance_apply->exp_year = $exp_year;

        $freelance_apply->save();
        return view('apply')->with(compact('work_details'));

    }
    public function logout(Request $request){
        Auth::logout();
        Session::flush();
            return Redirect::to('/');
        
    }
}
