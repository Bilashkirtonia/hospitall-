<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{

    public function index(){
        if(Auth::id()){
            return redirect("home");
        }else{
        $doctor = Doctor::all();
        return view("users.home",compact("doctor"));
        }
    }


   public function redirect(){
    if(Auth::id()){
        if(Auth::user()->usertype == "0"){
            $doctor = Doctor::all();
            return view("users.home",compact("doctor"));
        }else{
            return view("admin.dash");
        }

    }else{
        return redirect()->back();
    }
   }
  	

   public function appontment(Request $req){
        $appointment = new Appointment;
        $appointment->name =$req->name;
        $appointment->email =$req->email;
        $appointment->phone =$req->phone;
        $appointment->doctor =$req->doctor;
        $appointment->date =$req->date;
        $appointment->message =$req->message;
        $appointment->status ='In progress';
        if(Auth::id()){
        $appointment->user_id =Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message','The appointment book successfully.We will contract with you soon.');

   }
   public function myappointment(){
       if(Auth::id()){
           if(Auth::user()->usertype=='0'){
            $user = Auth::user()->id;
            $data = Appointment::where('user_id',$user)->get();
            return view('users.myappointment',compact('data'));
           }else{
               return redirect('login');
           }
        
       }else{
        return redirect()->back();
       }
       
   }
   public function cancel_appointment($id){
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
   }
  
}
