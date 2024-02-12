<?php

namespace App\Http\Controllers;

use App\Models\JobPostings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Companies;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function JobPosting(Request $request)
    {
        $table = new JobPostings;

        $request->validate([
            'JobId' => 'required',
            'CompanyId' => 'required',
            'Position' => 'required',
            'Field' => 'required',
            'Description' => 'required',
            'Salary' => 'required',
            'Requirement' => 'required',
            'ApplicationDeadline' => 'required',
        ]);

        $data = JobPostings::where('JobId', $request->JobId)->where('CompanyId', Session::get('Username'))->exists();

        if ($data) {
            $JobExists = "Job Data already exists in our database.";
            return view('Company.Job Posting')->with(compact('JobExists'));
        } else {
            $table->JobId = $request->JobId;
            $table->CompanyId = $request->CompanyId;
            $table->Position = $request->Position;
            $table->Field = $request->Field;
            $table->Description = $request->Description;
            $table->Salary = $request->Salary;
            $table->Requirement = $request->Requirement;
            $table->ApplicationDeadline = $request->ApplicationDeadline;

            if ($table->save()) {
                $success = "Job : " . $request->JobId . " Posted Successfully.";
                $jobs = JobPostings::all();
                return view('Company.Job Posting')->with(compact('success', 'jobs'));
            }
        }
    }

    public function DeleteJob($JobId)
    {
        $table = JobPostings::find($JobId);

        if (isset($table) && $table->delete()) {
            $jobs = JobPostings::all();
            $delete = "Job : " . $JobId . " is Deleted Successfully.";
            return view('Company.Job Posting')->with(compact('delete', 'jobs'));
        }
    }

    public function DeleteJob2($JobId)
    {
        $table = JobPostings::find($JobId);

        if (isset($table) && $table->delete()) {
            $jobs = JobPostings::all();
            $delete = "Job : " . $JobId . " is Deleted Successfully.";
            return view('Company.manageJobPostings')->with(compact('delete', 'jobs'));
        }
    }
}