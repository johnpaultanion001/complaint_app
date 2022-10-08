<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Models\User;
use Carbon\Carbon;
use Validator;
use File;

class StudentController extends Controller
{
    public function profile(){
            return view('student.profile'); 
    }

    public function update_profile(Request $request){
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'lrn'    => ['required'],
            'grade'    => ['required'],
            'section' => ['required'],
            'contact_number'    => ['required'],
            'guardian_name' => ['required'],
            'guardian_contact_number'    => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        User::where('id', 3)->update([
            'name' => $request->input('name'),
            'lrn' => $request->input('lrn'),
            'grade' => $request->input('grade'),
            'section' => $request->input('section'),
            'contact_number' => $request->input('contact_number'),
            'guardian_name' => $request->input('guardian_name'),
            'guardian_contact_number' => $request->input('guardian_contact_number'),
        ]);

        return response()->json(['success' => 'updated.']);
    }
}
