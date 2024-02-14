<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Mime\Email;
use App\Models\Administrator;
use App\Models\Students;
use App\Models\Companies;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class Register_Login extends Controller
{
    public function StudentRegister(Request $request)
    {
        $request->validate([
            'Enrollment_No' => 'required',
            'name' => 'required',
            'course' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|same:password_confirmation',
        ]);

        $data = Students::where('StudentId', $request->Enrollment_No)->first();
        if ($data) {
            $AccountExists = "Student already exists in our database.";
            return view('Register.Students')->with(compact('AccountExists'));
        } else {
            $table = new Students;
            $table->StudentId = $request->Enrollment_No;
            $table->UserType = "Student";
            $table->Name = $request->name;
            $table->Program = $request->course;
            $table->Mobile = $request->mobile;
            $table->Email = strtolower($request->email);
            $table->Password = md5($request->password);
            $table->OTP = rand(100000, 999999);

            $Name = $request->name;
            $Email = $request->email;

            if ($table->save()) {

                $success = "Thank you " . $Name . " for registering yourself on N.J. Sonecha Management and Technical Institute's Placement Cell.";

                Mail::send(new SendMail($Email, 'Registration Confirmation', $success));

                return view('Register.Students')->with(compact('success', 'Name'));
            }
        }
    }

    public function CompanyRegister(Request $request)
    {
        $request->validate([
            'CIN' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'industry' => 'required',
            'location' => 'required',
            'password' => 'required|min:8|same:password_confirmation',
        ]);

        $data = Companies::where('CompanyId', $request->CIN)->first();
        if ($data) {
            $AccountExists = "Company already exists in our database.";
            return view('Register.Company')->with(compact('AccountExists'));
        } else {
            $table = new Companies;
            $table->CompanyId = strtoupper($request->CIN);
            $table->UserType = "Company";
            $table->Name = $request->name;
            $table->Email = strtolower($request->email);
            $table->Industry = $request->industry;
            $table->Location = $request->location;
            $table->Password = md5($request->password);
            $table->OTP = rand(100000, 999999);

            $Name = $request->name;
            $Email = $request->email;

            if ($table->save()) {
                $success = "Thank you " . $Name . " for registering yourself on N.J. Sonecha Management and Technical Institute's Placement Cell.";

                Mail::send(new SendMail($Email, 'Registration Confirmation', $success));

                return view('Register.Company')->with(compact('success', 'Name'));
            }
        }
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'Login_type' => 'required',
                'Username' => 'required',
                'Password' => 'required|min:8'
            ]
        );
        $UserType = $request->Login_type;
        $Username = $request->Username;
        $Password = md5($request->Password);

        if ($UserType == "Administrator") {
            $data = Administrator::where('AdminId', $Username)->where('Password', $Password)->first();

            if ($data) {
                ;
                session(['UserType' => $request->Login_type]);
                session(['UserId' => $request->Username]);
                session(['Email' => $data['Email']]);

                return redirect('/administrator');
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Login')->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $data = Students::where('StudentId', $Username)->where('Password', $Password)->first();
            if ($data) {
                session(['UserType' => $request->Login_type]);
                session(['UserId' => $request->Username]);
                session(['Email' => $data['Email']]);

                return redirect('/student');
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Login')->with(compact('error'));
            }
        } else {
            $data = Companies::where('CompanyId', $Username)->where('Password', $Password)->first();

            if ($data) {
                ;
                session(['UserType' => $request->Login_type]);
                session(['UserId' => $request->Username]);
                session(['Email' => $data['Email']]);

                return redirect('/company');
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Login')->with(compact('error'));
            }
        }
    }

    public function loginWithOtp(Request $request)
    {
        $request->validate(
            [
                'Login_type' => 'required',
                'Username' => 'required',
            ]
        );
        $UserType = $request->Login_type;
        $Username = $request->Username;
        $OTP = rand(100000, 999999);

        if ($UserType == "Administrator") {
            $table = Administrator::where('AdminId', $Username)->first();
            if ($table) {
                $table->OTP = $OTP;
                if ($table->save()) {
                    $data = Administrator::where('UserType', $UserType)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour OTP is : " . $OTP;
                        if (
                            Mail::send(new SendMail($data['Email'], 'Login with OTP', $OTPMessage))
                        ) {
                            session(['UserType' => $request->Login_type]);
                            session(['UserId' => $request->Username]);
                            session(['Email' => $data['Email']]);
                            return redirect('/loginwithotp/verifyotp');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view("Login.Login_with_OTP")->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $table = Students::where('UserType', $UserType)->where('StudentId', $Username)->first();
            if ($table) {
                $table->OTP = $OTP;
                if ($table->save()) {
                    $data = Students::where('UserType', $UserType)->where('StudentId', $Username)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour OTP is : " . $OTP;
                        if (Mail::send(new SendMail($data['Email'], 'Login with OTP', $OTPMessage))) {
                            session(['UserType' => $request->Login_type]);
                            session(['UserId' => $request->Username]);
                            session(['Email' => $data['Email']]);
                            return redirect('/loginwithotp/verifyotp');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Login_with_OTP')->with(compact('error'));
            }
        } else {
            $table = Companies::where('UserType', $UserType)->where('CompanyId', $Username)->first();
            if ($table) {
                $table->OTP = $OTP;
                if ($table->save()) {
                    $data = Companies::where('UserType', $UserType)->where('CompanyId', $Username)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour OTP is : " . $OTP;
                        if (Mail::send(new SendMail($data['Email'], 'Login with OTP', $OTPMessage))) {
                            session(['UserType' => $request->Login_type]);
                            session(['UserId' => $request->Username]);
                            session(['Email' => $data['Email']]);
                            return redirect('/loginwithotp/verifyotp');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Login_with_OTP')->with(compact('error'));
            }
        }
    }

    public function verifyLoginOtp(Request $request)
    {
        $request->validate(
            [
                'OTP' => 'required'
            ]
        );
        $OTP = $request->OTP;
        if (session()->has('UserType') and session()->has('UserId') and session()->has('Email')) {
            $UserType = session('UserType');
            $UserId = session('UserId');
            $Email = session('Email');
        }

        if ($UserType == "Administrator") {
            $table = Administrator::where('UserType', $UserType)->where('AdminId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    return redirect('/administrator');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Varify_Login_OTP')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Varify_Login_OTP')->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $table = Students::where('UserType', $UserType)->where('StudentId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    return redirect('/student');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Varify_Login_OTP')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Varify_Login_OTP')->with(compact('error'));
            }
        } else {
            $table = Companies::where('UserType', $UserType)->where('CompanyId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    return redirect('/company');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Varify_Login_OTP')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Varify_Login_OTP')->with(compact('error'));
            }
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(
            [
                'Login_type' => 'required',
                'Username' => 'required',
            ]
        );

        $UserType = $request->Login_type;
        $Username = $request->Username;
        $OTP = rand(100000, 999999);

        if ($UserType == "Administrator") {
            $table = Administrator::where('AdminId', $Username)->first();
            $table->OTP = $OTP;
            $data = Administrator::where('UserType', $UserType)->first();
            if ($data) {
                $table->save();
                $OTPMessage = "Hi " . $data['Name'] . " \nYour Secret Key is : " . $OTP;
                if (Mail::send(new SendMail($data['Email'], 'Forgot Password', $OTPMessage))) {
                    session(['UserType' => $request->Login_type]);
                    session(['UserId' => $request->Username]);
                    session(['Email' => $data['Email']]);
                    return redirect('/forgotpassword/keyvarification');
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Forgot_Password')->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $data = Students::where('UserType', $UserType)->where('StudentId', $Username)->first();
            if ($data) {
                $data->OTP = $OTP;
                $data->save();
                $OTPMessage = "Hi " . $data['Name'] . " \nYour Secret Key is : " . $OTP;
                if (Mail::send(new SendMail($data['Email'], 'Forgot Password', $OTPMessage))) {
                    session(['UserType' => $request->Login_type]);
                    session(['UserId' => $request->Username]);
                    session(['Email' => $data['Email']]);
                    return redirect('/forgotpassword/keyvarification');
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Forgot_Password')->with(compact('error'));
            }
        } else {
            $data = Companies::where('UserType', $UserType)->where('CompanyId', $Username)->first();
            if ($data) {
                $data->OTP = $OTP;
                $data->save();
                $OTPMessage = "Hi " . $data['Name'] . " \nYour Secret Key is : " . $OTP;
                if (Mail::send(new SendMail($data['Email'], 'Forgot Password', $OTPMessage))) {
                    session(['UserType' => $request->Login_type]);
                    session(['UserId' => $request->Username]);
                    session(['Email' => $data['Email']]);
                    return redirect('/forgotpassword/keyvarification');
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Forgot_Password')->with(compact('error'));
            }
        }
    }

    public function keyVarification(Request $request)
    {
        $request->validate(
            [
                'key' => 'required',
            ]
        );
        $OTP = $request->key;
        if (session()->has('UserType') and session()->has('UserId') and session()->has('Email')) {
            $UserType = session('UserType');
            $UserId = session('UserId');
            $Email = session('Email');
        }

        if ($UserType == "Administrator") {
            $table = Administrator::where('UserType', $UserType)->where('AdminId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    $OTP = rand(100000, 999999);
                    $table->OTP = $OTP;
                    $table->save();
                    return redirect('/forgotpassword/keyvarification/createnewpassword');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Key_Varification')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Key_Varification')->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $table = Students::where('UserType', $UserType)->where('StudentId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    $OTP = rand(100000, 999999);
                    $table->OTP = $OTP;
                    $table->save();
                    return redirect('/forgotpassword/keyvarification/createnewpassword');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Key_Varification')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Key_Varification')->with(compact('error'));
            }
            $table = Students::where('UserType', $UserType)->where('StudentId', $UserId)->first();
            $checkOTP = $table->OTP;
            echo $checkOTP . " " . $OTP;
        } else {
            $table = Companies::where('UserType', $UserType)->where('CompanyId', $UserId)->first();
            if ($table) {
                $CheckOTP = $table->OTP;
                if ($CheckOTP == $OTP) {
                    $OTP = rand(100000, 999999);
                    $table->OTP = $OTP;
                    $table->save();
                    return redirect('/forgotpassword/keyvarification/createnewpassword');
                } else {
                    $error = "Credentials are not matched with our database.";
                    return view('Login.Key_Varification')->with(compact('error'));
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Key_Varification')->with(compact('error'));
            }
        }
    }

    public function createNewPassword(Request $request)
    {
        $request->validate(
                        ['password' => 'required|min:8|confirmed',
    'password_confirmation' => 'required',
]);

        if (session()->has('UserType') and session()->has('UserId') and session()->has('Email')) {
            $UserType = session('UserType');
            $UserId = session('UserId');
            $Email = session('Email');
        }

        if ($UserType == "Administrator") {
            $table = Administrator::where('AdminId', $UserId)->first();
            if ($table) {
                $table->Password = md5($request->password);
                if ($table->save()) {
                    $data = Administrator::where('UserType', $UserType)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour Password is Changed Successfully.";
                        if (Mail::send(new SendMail($data['Email'], 'Password is Changed', $OTPMessage))) {
                            Session::flush();
                            return redirect('/login');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Create_New_Password')->with(compact('error'));
            }
        } else if ($UserType == "Student") {
            $table = Students::where('UserType', $UserType)->where('StudentId', $UserId)->first();
            if ($table) {
                $table->Password = md5($request->password);
                if ($table->save()) {
                    $data = Students::where('UserType', $UserType)->where('StudentId', $UserId)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour Password is Changed Successfully.";
                        if (Mail::send(new SendMail($data['Email'], 'Password is Changed', $OTPMessage))) {
                            Session::flush();
                            return redirect('/login');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Create_New_Password')->with(compact('error'));
            }
        } else {
            $table = Companies::where('UserType', $UserType)->where('CompanyId', $UserId)->first();
            if ($table) {
                $table->Password = md5($request->password);
                if ($table->save()) {
                    $data = Companies::where('UserType', $UserType)->where('CompanyId', $UserId)->first();
                    if ($data) {
                        $OTPMessage = "Hi " . $data['Name'] . " \nYour Password is Changed Successfully.";
                        if (Mail::send(new SendMail($data['Email'], 'Password is Changed', $OTPMessage))) {
                            Session::flush();
                            return redirect('/login');
                        }
                    }
                }
            } else {
                $error = "Credentials are not matched with our database.";
                return view('Login.Create_New_Password')->with(compact('error'));
            }
        }
    }
}