<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function updateprofile(Request $request)
    {
        $request->validate(
            [
                'Enrollment_No' => 'required',
                'name' => 'required',
                'course' => 'required',
                'mobile' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|same:password_confirmation',
            ]
        );

        $table = Students::where('StudentId', Session('UserId'))->first();
        $table->UserType = "Student";
        $table->Name = $request->name;
        $table->Program = $request->course;
        $table->Mobile = $request->mobile;
        $table->Email = strtolower($request->email);
        if ($request->password != "11111111") {
            $table->Password = md5($request->password);
        }

        $table->OTP = rand(100000, 999999);

        if ($table->save()) {
            $success = "Your profile updated successfully.";

            Mail::send(new SendMail($request->email, 'Update Profile', $success));

        $Student = Students::where('StudentId', Session('UserId'))->first();            return view('Student.Update Profile')->with(compact('success', 'Student'));
        }
    }
}