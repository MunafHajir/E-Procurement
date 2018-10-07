<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Vendor extends Controller
{
    //
    public function getVendorData(Request $request){
        $userid = Auth::id();
        $vendor_details = DB::table('users')->where('id',$userid)->get();
        // $test = $request->session()->get('username');
        return view('vendor')->with(compact('vendor_details'));
    }

    public function postVendorData(Request $request){
        $work = new Work();

        $userid = Auth::id();
        $vendor_details = DB::table('users')->where('id',$userid)->get();

        $company_name =  $vendor_details[0]->company_name;
        $username = $vendor_details[0]->username;
        $email = $vendor_details[0]->email;
        
        $works = $_POST['work'];
        $budget = $_POST['budget'];
        $deadline = $_POST['deadline'];
        $description = $_POST['description'];

        $work->company_name = $company_name;
        $work->email = $email;
        $work->username = $username;
        $work->work = $works;
        $work->budget = $budget;
        $work->deadline = $deadline;
        $work->description = $description;
        $work->save();

        return view('vendor')->with(compact('vendor_details'));
    }
}
