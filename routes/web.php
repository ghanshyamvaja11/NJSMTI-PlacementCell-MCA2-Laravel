<?php

use App\Models\Administrator;
use App\Models\Companies;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register_Login;
use App\Models\Events;

;
use App\Models\Applications;
use App\Models\JobPostings;
use App\Models\Students;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;
use App\Models\Placements;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $Placement = Placements::all();
    $Job = JobPostings::all();
    $Student = Students::all();
    $Company = Companies::all();

    return view('welcome', compact('Placement', 'Job', 'Student', 'Company'));
});
Route::get('/contactus', function () {
    return view('ContactUs');
});
Route::post('/contactus', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    $query_type = $request->query_type;
    $description = $request->description;

    $ContactUs = new ContactUs();
    $ContactUs->name = $name;
    $ContactUs->Email = $email;
    $ContactUs->Query_Type = $query_type;
    $ContactUs->description = $description;

    if ($ContactUs->save()) {
        $Success = "Hi {$name},Your Query Is Submitted Successfully.";
        // mail($email, "Thank You for Contacting Us", $Success);
        return view('ContactUs')->with(compact('Success'));
    }
});

//Registration Login
Route::get('/registration', function () {
    return view('Register.Type');
});
Route::get('/register/student', function () {
    return view('Register.Students');
});
Route::post('/register/student', [Register_Login::class, 'StudentRegister']);
Route::get('/register/company', function () {
    return view('Register.Company');
});
Route::post('/register/company', [Register_Login::class, 'CompanyRegister']);
Route::get('/login', function () {
    return view('Login.Login');
});
Route::post('/login', [Register_Login::class, 'login']);
Route::get('/loginwithotp', function () {
    return view('Login.Login_with_OTP');
});
Route::post('/loginwithotp', [Register_Login::class, 'loginWithOtp']);
Route::get('/loginwithotp/verifyotp', function () {
    return view('Login.Varify_Login_OTP');
});
Route::post('/loginwithotp/verifyotp', [Register_Login::class, 'verifyLoginOtp']);
Route::get('/forgotpassword', function () {
    return view('Login.Forgot_Password');
});
Route::post('/forgotpassword', [Register_Login::class, 'forgotPassword']);
Route::get('/forgotpassword/keyvarification', function () {
    return view('Login.Key_Varification');
});
Route::post('/forgotpassword/keyvarification', [Register_Login::class, 'keyVarification']);
Route::get('/forgotpassword/keyvarification/createnewpassword', function () {
    return view('Login.Create_New_Password');
});
Route::post('/forgotpassword/keyvarification/createnewpassword', [Register_Login::class, 'createNewPassword']);

//User : Administrator
Route::get('/administrator', function () {
    return view('Administrator.index');
});

Route::get('/administrator/logout', function () {
    Session::flush();
    return redirect('/login');
});
Route::get('/administrator/solvequery', function () {
    $query = ContactUs::all();
    return view('Administrator.QuerySolve')->with(compact('query'));
});
Route::get('/administrator/query/{email}', function ($email) {
    $User = ContactUs::where('email', $email)->first();
    return view('Administrator.QuerySolve')->with(compact('User'));
});
Route::post('/administrator/solvequery', function (Request $request) {
    $email = $request->email;
    $user = ContactUs::where('email', $email)->first();
    $reply = $request->reply;
    Mail::send(new SendMail($email, $user->Query_Type, $reply));
    if ($user->delete()) {
        return redirect('/administrator/solvequery');
    }
});
// Route::get('/administrator/changeemail', function(){
//     return view('Administrator.Change Email');;
// });
// Route::post('/administrator/changeemail', [AdministratorController::class, 'ChangeEmail']);

// Route::get('/administrator/changepassword', function(){
//     return view('Administrator.Change Password');
// });
// Route::post('/administrator/changepassword', [AdministratorController::class, 'ChangePassword']);

Route::get('/administrator/students', function () {
    return view('Administrator.Students Data');
});

Route::post('/administrator/students/find/enrollment', [AdministratorController::class, 'searchbyenrollmentnumber']);

Route::post('/administrator/students/find/class', [AdministratorController::class, 'searchbyclass']);

Route::get('/administrator/company', function () {
    return view('Administrator.Company Data');
});

Route::post('/administrator/company/find/cin', [AdministratorController::class, 'searchbycin']);

Route::post('/administrator/company/find/industry', [AdministratorController::class, 'searchbyindustry']);

Route::get('/administrator/company/manage', function () {
    return view('Administrator.ManageCompany');
});
Route::post('/administrator/company/manage/cin', [AdministratorController::class, 'Managebycin']);
Route::post('/administrator/company/manage/industry', [AdministratorController::class, 'Managebyindustry']);


Route::get('/administrator/students/manage', function () {
    return view('Administrator.ManageStudents');
});
Route::post('/administrator/student/manage/enrollment', [AdministratorController::class, 'Managebyenrollment']);
Route::post('/administrator/student/manage/class', [AdministratorController::class, 'Managebyclass']);
Route::get('/administrator/placement/register', function () {
    return view('Administrator.Placements');
});
Route::post('/administrator/placement/register', [AdministratorController::class, 'Placements']);
Route::get('/administrator/event/create', function () {
    $events = Events::all();
    $noofevents = $events->count();
    return view('Administrator.Event')->with(compact('events', 'noofevents'));
});
Route::post('/administrator/event/create', [AdministratorController::class, 'Event']);
Route::get('/administrator/event/delete/{EventId}', [AdministratorController::class, 'EventDelete']);


//User : Student
Route::get('/student', function () {
    return view('Student.index');
});
Route::get('/student/logout', function () {
    Session::flush();
    return redirect('/login');
});

Route::get('/student/uploadresume', function () {
    $Student = Students::where('StudentId', Session::get('UserId'))->first();

    return view('Student.upload resume')->with(compact('Student'));
});

Route::get('/student/updateprofile', function () {
    $Student = Students::where('StudentId', Session('UserId'))->first();
    return view('Student.Update Profile')->with(compact('Student'));
});
Route::post('/student/updateprofile', [StudentController::class, 'updateprofile']);
Route::post('/student/uploadresume', function (Request $request) {
    $User = Session('UserId');
    $table = Students::where('StudentId', $User)->first();
    $table->Resume_Path = $request->ResumeLink;
    $table->save();

    return redirect('/student/uploadresume');
});

Route::get('/student/jobs', function () {
    $UserId = session('UserId');
    $jobs = '';
    $jobapplication = Applications::where('StudentId', $UserId)->get();
    $JobIds = [];
    $Status = [];
    $remainingjobs = 0;

    if (count($jobapplication) > 0) {
        foreach ($jobapplication as $jobapplication) {
            $JobIds[] = $jobapplication->JobId;
            $Status[] = $jobapplication->Status;
        }
        $jobs = DB::table('JobPostings')->whereNotIn('JobId', $JobIds)->get();
        $remainingjobs = DB::table('JobPostings')->whereIn('JobId', $JobIds)->get();
        return view('Student.Jobs')->with(compact('jobs', 'remainingjobs', 'Status'));
    } else {
        $jobs = JobPostings::all();
        return view('Student.Jobs')->with(compact('jobs'));
    }
});
Route::get('/student/applies', function () {
    $UserId = session('UserId');
    $jobapplication = Applications::where('StudentId', $UserId)->get();
    $JobIds = [];
    $Status = [];
    $remainingjobs = 0;

    if (count($jobapplication) > 0) {
        foreach ($jobapplication as $jobapplication) {
            $JobIds[] = $jobapplication->JobId;
            $Status[] = $jobapplication->Status;
        }
        $applies = DB::table('JobPostings')->whereIn('JobId', $JobIds)->get();
        if (isset($applies)) {
            return view('Student.Job Applies')->with(compact('applies', 'Status'));
        }
    } else {
        $ApplicationExists = "No data available about Job Applies.";
        return view('Student.Job Applies')->with(compact('ApplicationExists'));
    }
});
Route::get('/student/jobs/view/{JobId}', function ($JobId) {
    $jobs = JobPostings::where('JobId', $JobId)->first();
    $CompanyId = Companies::where('CompanyId', $jobs->CompanyId)->first();
    return view('Student.Job Information')->with(compact('jobs', 'CompanyId'));
});
Route::get('/student/jobs/apply/{UserId}/{JobId}', function (Request $request, $UserId, $JobId) {
    $Student = Students::where('StudentId', $UserId)->first();
    if ($Student->Resume_Path == '') {
        return redirect('/student/uploadresume');
    } else {
        $ApplicationId = rand(10000000000, 99999999999);
        $table = new Applications;
        $table->ApplicationId = $ApplicationId;
        $table->StudentId = $UserId;
        $table->JobId = $JobId;
        $table->ApplicationDate = date('d-m-y');
        if ($table->save()) {
            $success = "Your job application is submitted successfully.";
            $StudentId = $UserId;
            $table = Students::where('StudentId', $StudentId)->exists();
            $masg = "Hi " . $StudentId . ", \nYour Job Application Submitted Successfully. Your Application  Number is : " . $ApplicationId . ".";

            $data = Applications::where('StudentId', $UserId)->where('JobId', $JobId)->exists();
            $table = Students::where('StudentId', $StudentId)->first();
            if ($data) {
                $success = "Your Job Application is Successful.";
                // mail($table->Email, 'Confirmation of Job Application', $masg);
                return redirect('/student/jobs')->with(compact('success'));
            }
        }
    }
});
Route::get('/student/jobs/view/applied/{JobId}', function ($JobId) {
    $jobs = JobPostings::where('JobId', $JobId)->first();
    $CompanyId = Companies::where('CompanyId', $jobs->CompanyId)->first();
    $applied = true;
    return view('Student.Job Information')->with(compact('jobs', 'CompanyId', 'applied'));
});
Route::get('/student/events', function () {
    $events = Events::all();
    return view('Student.Events')->with(compact('events'));
});
Route::get('/student/events/view/{EventId}', function ($EventId) {
    $Event = Events::where('EventId', $EventId)->first();
    return view('Student.Event Information')->with(compact('Event'));
});


//User : Company
Route::get('/company', function () {
    return view('Company.index');
});
Route::get('/company/logout', function () {
    Session::flush();
    return redirect('/login');
});

Route::get('/company/jobposting', function () {
    $jobs = JobPostings::all();
    return view('Company.Job Posting')->with(compact('jobs'));
});
Route::post('/company/jobposting', [CompanyController::class, 'JobPosting']);
Route::get('/company/jobs/delete/{JobId}', [CompanyController::class, 'DeleteJob']);
Route::get('/company/managejobpostings', function () {
    $jobs = JobPostings::all();
    return view('Company.manageJobPostings')->with(compact('jobs'));
});
Route::get('/company/jobs/manage/delete/{JobId}', [CompanyController::class, 'DeleteJob2']);
Route::get('/company/jobapplications', function () {
    $applications = Applications::all();
    return view('Company.recievedJobApplications')->with(compact('applications'));
});
Route::get('/company/jobposting/show/{StudentId}', function ($StudentId) {
    $Student = Students::where('StudentId', $StudentId)->first();
    return view('Company.Applicant Profile')->with(compact('StudentId', 'Student'));
});
Route::get('/company/jobposting/approve/{{ApplicationId}}', function ($ApplicationId) {
    $table = Applications::where('ApplicationId', $ApplicationId)->exists();

    if ($table) {
        $table->Status = "Y";
        $ApplicationId = $table->ApplicationId;
        $JobId = $table->JobId;
        $StudentId = $table->StudentId;
        if ($table->save()) {
            $table2 = Students::where('StudentId', $StudentId);
            $masg = "Hi " . $table2->Name . ", \nYour Job Application : " . $ApplicationId . " for Job Id : " . $JobId . " is approved we'll inform you soon about interview process.";
            // mail($table2, 'confirmation of job application approval', $masg);
            return redirect('/company/managejobpostings');
        }
    }
});
Route::get('/company/jobposting/reject/{{ApplicationId}}', function ($ApplicationId) {
    $table = Applications::where('ApplicationId', $ApplicationId)->exists();

    if ($table) {
        $table->Status = "N";
        $ApplicationId = $table->ApplicationId;
        $JobId = $table->JobId;
        $StudentId = $table->StudentId;
        if ($table->save()) {
            $table2 = Students::where('StudentId', $StudentId);
            $masg = "Hi " . $table2->Name . ", \nYour Job Application : " . $ApplicationId . " for Job Id : " . $JobId . " is rejected, Thank you for apply.";
            // mail($table2, 'confirmation of job application Rejection', $masg);
            $table3 = Applications::find($ApplicationId);
            $table3->delete();
            return redirect('/company/managejobpostings');
        }
    }
});
Route::get('/company/events', function () {
    $events = Events::all();
    return view('Company.Events')->with(compact('events'));
});
Route::get('/company/events/view/{EventId}', function ($EventId) {
    $Event = Events::where('EventId', $EventId)->first();
    return view('Company.Event Information')->with(compact('Event'));
});