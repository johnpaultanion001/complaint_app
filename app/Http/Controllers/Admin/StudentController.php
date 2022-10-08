<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Complaint;
use Carbon\Carbon;
use Validator;
use File;

class StudentController extends Controller
{
    public function profile(){
            return view('student.profile'); 
    }

    public function update_profile(Request $request){
        if(auth()->user()->profile != ""){
            $val_profile = ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'] ;
        }else{
            $val_profile = ['required' ,'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'] ;
        }
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'lrn'    => ['required'],
            'grade'    => ['required'],
            'section' => ['required'],
            'contact_number'    => ['required'],
            'guardian_name' => ['required'],
            'guardian_contact_number'    => ['required'],
            'profile' =>  $val_profile,
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        if($request->file('profile')){
            File::delete(public_path('assets/student/'.Auth()->user()->profile));
            $id = $request->file('profile');
            $extension = $id->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".auth()->user()->id.".".$extension;
            $id->move('public/assets/student/', $file_name_to_save);
        }
        

        User::where('id', Auth()->user()->id)->update([
            'name' => $request->input('name'),
            'lrn' => $request->input('lrn'),
            'grade' => $request->input('grade'),
            'section' => $request->input('section'),
            'contact_number' => $request->input('contact_number'),
            'guardian_name' => $request->input('guardian_name'),
            'guardian_contact_number' => $request->input('guardian_contact_number'),
            'profile'   => $file_name_to_save ?? Auth()->user()->profile,
        ]);

        return response()->json(['success' => 'updated']);
    }

    public function sanction(){
        return view('student.sanction'); 
    }

    public function complaint(){
        return view('student.complaint'); 
    }

    public function store_complaint(Request $request){
        $validated =  Validator::make($request->all(), [
            'complained_name' => ['required'],
            'complaint'    => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        Complaint::create([
            'user_id' => Auth()->user()->id,
            'complained_name' => $request->input('complained_name'),
            'isStudent' => $request->input('isStudent') ? true : false,
            'isTeacher' => $request->input('isTeacher') ? true : false,
            'grade' => $request->input('grade'),
            'section' => $request->input('section'),
            'complaint' => $request->input('complaint'),
        ]);

        return response()->json(['success' => 'Your complaint has been sent.']);
    }
    
}
