<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor;
use App\mc;
use App\Mail\mailmc;

//sayonara

class doctorController extends Controller
{
    public function showDashboard($loginid)
    {
        $loginid = $loginid;
        return view('doctordashboard', compact("loginid"));
    }


    public function checkLogin(Request $request)
    {
 
        $login_id =  $request->login_id;
        $password = $request->pwd;

        $docExist= doctor::where('doctor_loginid', $login_id)->first();
        

        if ($password == $docExist->doctor_password){
            
            return response()->json(['success' => "success", 'loginid' => $login_id]);
            \Session::put('logged_doc', 'success');
            
        }
        
        else{

            return response()->json(['failed' => "Wrong username of password"]);
        }

        
    }


    public function regmc(Request $request)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required',
            'IC' => 'required',
        ]);


            $mc = new mc;
            $mc->patient_name = $request->patient_name;
            $mc->patient_IC = $request->IC;
            $mc->patientHP_num = $request->HP;
            $mc->patientHR_email = $request->email;
            $mc->date_admission = $request->admission_date;
            $mc->date_discharge = $request->discharge_date;
            $mc->date_issued = $request->issued_date;
            $mc->doctor_id = $request->doctor_id;
            $mc->save(); 

            // $mc =  mc::with('doctor')->where('mc_id', $mc->id)->first(); 

            if ($mc){


                $mc =  mc::with('doctor')->where('mc_id', $mc->mc_id)->first(); 

                $start_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mc->date_admission)->format('d-m-Y');
                $start_time_ob = new \Carbon\Carbon($start_time);
       
                $finish_time =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mc->date_discharge)->format('d-m-Y');
                $finish_time_ob = \Carbon\Carbon::parse($finish_time);
                $diff =  $finish_time_ob->diffInDays($start_time_ob);
    

                $details = [
                    'mcid' => $mc->mc_id,
                    'emel' => $mc->patientHR_email,
                    'name' =>  $mc->patient_name,
                    'ic' => $mc->patient_IC,
                    'HP' => $mc->patientHP_num,
                    'admission_date' =>$mc->date_admission,
                    'discharge_date' => $mc->date_discharge,
                    'doktor_name' => $mc->doctor->doctor_name,
                    'date_issued' =>$mc->date_issued,
                ];

                \Mail::to( $request->email)->send(new mailmc($details, $diff));

                return response()->json(['success' => "data added", 'ic' =>  $request->IC]);

    
             }
            
            
    }



    public function checkmc(Request $request)
    {    

         $mc_id = $request->mc;

         $mcexist =  mc::with('doctor')->where('mc_id', $mc_id)->first();
         //dd($mcexist->doctor->doctor_name);

         //\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mcexist->date_discharge)->format('d-m-Y');
    
         if ($mcexist){

            $start_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mcexist->date_admission)->format('d-m-Y');
            $start_time_ob = new \Carbon\Carbon($start_time);
   
            $finish_time =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mcexist->date_discharge)->format('d-m-Y');
            $finish_time_ob = \Carbon\Carbon::parse($finish_time);
            $diff =  $finish_time_ob->diffInDays($start_time_ob);

            return view('checkmc', compact(["mcexist", "diff"]));

         }
            else {
                
           \Session::flash('fail', 'MC ID didnt exist');
           //$request->session()->flash('fail', 'MC ID didnt exist');
           return redirect()->back();
         }
        
        
        
    }

    public function mcqr(Request $request, $id)
    {    


         $mcexist =  mc::with('doctor')->where('mc_id', $id)->first();
         if ($mcexist){

            $start_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mcexist->date_admission)->format('d-m-Y');
            $start_time_ob = new \Carbon\Carbon($start_time);
   
            $finish_time =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$mcexist->date_discharge)->format('d-m-Y');
            $finish_time_ob = \Carbon\Carbon::parse($finish_time);
            $diff =  $finish_time_ob->diffInDays($start_time_ob);

            return view('mcqr', compact(["mcexist", "diff"]));

         }
           
        
    }



    public function update_acc_view(Request $request, $loginid)
    {
        $doctor = doctor::where('doctor_loginid', $loginid)->first();

        //$hp = $doctor->doctor_hpno;

        return view('update_doctor_acc', compact(['doctor', 'loginid']));

        //print number in reversed order

       
    }

    public function view_account_doc(Request $request, $loginid)
    {
        $doctor = doctor::where('doctor_loginid', $loginid)->first();

        //$hp = $doctor->doctor_hpno;

        return view('view_doc_acc', compact(['doctor', 'loginid']));

       
    }

    public function update_acc(Request $request, $loginid)
    {
        $doctor = doctor::where('doctor_loginid', $loginid)->first();

        $doctor->doctor_hpno = $request->hp;
        $doctor->doctor_password = $request->password;
        $doctor->doctor_email = $request->email;
        $doctor->save();

        return response()->json(['success' => "credentials updated"]);
    }

}
