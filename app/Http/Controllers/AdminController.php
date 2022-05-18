<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

use Notification;
use App\Notifications\myEmailNotification;
class AdminController extends Controller
{
   public function add_new_doctors(){
       if(Auth::id()){
            if(Auth::user()->usertype == '1'){
                $data=Doctor::all();
                return view('admin.add_new_doctor',compact("data"));
            }else{
                return redirect()->back();
            }
       }else{
        return redirect('login');
       }
    // $data=Doctor::all();
    // return view('admin.add_new_doctor',compact("data"));
   }

   public function add_doctor(Request $request){
        $doctor = new Doctor;
        $image = $request->image;
        $imageName = time()."-".$image->getClientOriginalExtension();
        $request->image->move("doctorImage",$imageName);
        $doctor->image = $imageName; 
        $doctor->name=$request->Doctor_name;
        $doctor->phone=$request->Doctor_number;
        $doctor->room=$request->Doctor_room;
        $doctor->specility=$request->specility;
        $doctor->save();
        return redirect()->back()->with("message","Doctor update successfully");

        }
        public function delect_doctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();

        }

        public function update_doctor($id){
            $data =Doctor::find($id);
            return view('admin.update_doctor',compact("data"));
        }

        public function edit_update_doctor(Request $request,$id){
            $doctor = Doctor::find($id);
            $image = $request->image;
            $imageName = time()."-".$image->getClientOriginalExtension();
            $request->image->move("doctorImage",$imageName);
            $doctor->image = $imageName; 
            $doctor->name=$request->Doctor_name;
            $doctor->phone=$request->Doctor_number;
            $doctor->room=$request->Doctor_room;
            $doctor->specility=$request->specility;
            $doctor->save();
            return redirect()->back()->with("message","Doctor update successfully");


            //return view('admin.update_doctor',compact("data"));
        }
        public function appointment(){

            if(Auth::id()){
                if(Auth::user()->usertype == '1'){
                    $data=Appointment::all();
                    return view('admin.appointment',compact('data'));
                }else{
                    return redirect()->back();
                }
           }else{
            return redirect('login');
           }
            
        }

        public function remove_appointment($id){

            $data=Appointment::find($id);
            $data->delete();
            return redirect()->back()->with("message","Appointment delete successfully successfully");
        }
        public function approve($id){

            $data=Appointment::find($id);
            $data->status="Approved";
            $data->save();
            return redirect()->back();
        }

        public function cancel($id){

            $data=Appointment::find($id);
            $data->status="Cancel";
            $data->save();
            return redirect()->back();
        }
        public function email($id){
            $data=Appointment::find($id);
            return view('admin.email',compact('data'));
    
            }

        public function send_email(Request $req,$id){
                $data=Appointment::find($id);
                $details = [
                    'greeting'=>$req->greeting,
                    'body'=>$req->body,
                    'action_text'=>$req->action_text,
                    'action_url'=>$req->action_url,
                    'end_part'=>$req->end_part
                ];
                  Notification::send($data,new myEmailNotification($details));
                  return redirect()->back(); 
                }
            
}


