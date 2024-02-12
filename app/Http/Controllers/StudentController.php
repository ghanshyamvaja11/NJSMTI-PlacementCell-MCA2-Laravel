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
    public function uploadresume(Request $request)
    {
        $request->validate(
            [
                'resume' => 'required|mimes:pdf,txt,word',
            ]
        );
        $User = Session('UserId');
        $uploadedresume = $request->file('resume');
        $filename = "Student " . $User . "." . $uploadedresume->getClientOriginalExtension();

        // if(Storage::disk("public")->exists('public/uploads/'. $filename)){
        //     Storage::disk("public")->delete('public/uploads/'.$filename);
        echo "hi";
        // }

        $table = Students::where('StudentId', $User)->first();
        $table->Resume_Path = "public/" . $uploadedresume->storeAs('uploads', $filename, 'public_html');
        $table->save();
        // return redirect('/student/uploadresume');
    }

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

            mail($request->email, 'Update Profile', $success);

            return view('Student.Update Profile')->with(compact('Your profile  is updated successfully.'));
        }
    }
}