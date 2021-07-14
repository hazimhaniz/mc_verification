<?php

namespace App\Http\Controllers;
use App\admin;
use App\doctor;
use App\Mail\mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    public function adminLogin()
    {

        return view('adminLogin');
    }

    public function checkLogin(Request $request)
    {   

        
        $email = $request->email;
        $password = $request->pwd;

        $emailExist = admin::where('admin_email', $email)->first();
        

        if ( $password == $emailExist->admin_password){

            \Session::put('cred', $emailExist->admin_id );
            
            return response()->json(['success' => "success"]);
            
        }
        
        else{

            return['failed' => "Wrong username of password"];
        }



    }

    public function adminDashboard()
    {


        return view('admindashboard');
    }

    public function view_admin()
    {
        $cred = \Session::get('cred');
        $admin = admin::where('admin_id', $cred)->first();

        return view('view_admin_acc', compact('admin'));

        // return view('admindashboard', compact('email'));
    }


    public function update_admin()
    {
        $cred = \Session::get('cred');
        $admin = admin::where('admin_id', $cred)->first();

        return view('update_admin_acc', compact('admin'));

        // return view('admindashboard', compact('email'));
    }

    public function update_admin_save(Request $request, $id)
    {

        $admin = admin::where('admin_id', $id)->first();
        $admin->admin_email = $request->email;
        $admin->admin_password = $request->password;
        $admin->admin_handphone = $request->hp;
        $admin->save();

        return response()->json(['success' => "updated admin successfully"]);
         
    }





    public function update_doctor()
    {   

        $doctor = doctor::all();

        return view('updatedoctor', compact('doctor'));
    }

    public function view_doctor()
    {

        $doctor = doctor::all();

        return view('viewdoctor', compact('doctor'));
    }

    public function view_delete_doctor()
    {

        $doctor = doctor::all();

        return view('deletedoctor', compact('doctor'));
    }

    public function delete_doctor($id)
    {
        $doctor = doctor::where('doctor_id', $id)->first();

        if ($doctor){
            $doctor->delete();
            
        }

        return response()->json(["success" => "deleted successfully", "name" => $doctor->doctor_name]);

    }


    public function getdoc($id)
    {

        $doctor = doctor::where('doctor_id', $id)->first();

        return response()->json(['doc' => $doctor, 'id' => $id]);
    }

    public function savedoc(Request $request, $id)
    {
        
        $doctor = doctor::where('doctor_id', $id)->first();
        $doctor->doctor_name = $request->name;
        $doctor->doctor_position = $request->position;
        $doctor->doctor_departmentname = $request->department;
        $doctor->save();

        return response()->json(['success' => "updated successfully"]);

    }


    public function regdoc(Request $request)
    {   
        
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!');
        $password = substr($random, 0, 5);

        $doctor = new doctor;
        $doctor->doctor_name = $request->name;
        $doctor->doctor_email = $request->email;
        $doctor->doctor_departmentname = $request->department;
        $doctor->doctor_loginid = $request->docloginid;
        $doctor->doctor_password = $password;
        $doctor->admin_id = 1;
        $doctor->save();

        $details = [
            'title' => 'Doctor account activated',
            'body' => 'This is for testing email using smtp',
            'name' => $request->name,
            'login_id' =>$request->docloginid,
            'password' => $password
        ];
        
       
        \Mail::to( $request->email)->send(new mail($details));

        return response()->json(['success' => "doctor added successfully"]);

    }


}
