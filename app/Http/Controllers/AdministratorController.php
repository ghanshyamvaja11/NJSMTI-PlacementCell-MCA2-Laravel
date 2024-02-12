<?php
namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Placements;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Applications;
use App\Models\Companies;
use App\Models\JobPostings;
use App\Models\Events;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class AdministratorController extends Controller
{
    //Students
    public function searchbyenrollmentnumber(Request $request)
    {
        $request->validate(
            [
                'StudentId' => 'required'
            ]
        );
        $StudentId = $request->StudentId;
        $student = Students::where('StudentId', $StudentId)->first();
        $data = compact('StudentId', 'student');

        return view('Administrator.Students Data')->with($data);
    }

    public function searchbyclass(Request $request)
    {
        $request->validate(
            [
                'Class' => 'required'
            ]
        );
        $Class = $request->Class;
        $Students = Students::where('Program', $request->Class)->get();

        $data = compact('Class', 'Students');
        return view('Administrator.Students Data')->with($data);
    }

    //Companies
    public function searchbycin(Request $request)
    {
        $request->validate(
            [
                'CIN' => 'required'
            ]
        );
        $CompanyId = $request->CIN;
        $company = Companies::where('CompanyId', $CompanyId)->first();
        $data = compact('CompanyId', 'company');

        return view('Administrator.Company Data')->with($data);
    }

    public function searchbyindustry(Request $request)
    {
        $request->validate(
            [
                'Industry' => 'required'
            ]
        );
        $Industry = $request->Industry;
        $companies = Companies::where('Industry', $Industry)->get();

        $data = compact('Industry', 'companies');
        return view('Administrator.Company Data')->with($data);
    }

    public function Managebycin(Request $request)
    {
        $request->validate([
            'CIN' => 'required',
        ]);

        $CompanyId = $request->CIN;
        $company = Companies::where('CompanyId', $CompanyId)->first();

        if (isset($company) && $company->delete()) {
            JobPostings::where('CompanyId', $CompanyId)->delete();
            $deletecin = $CompanyId;
            return view('Administrator.ManageCompany')->with(compact('deletecin', 'CompanyId'));
        } else {
            $cinnotfoundindatabase = $CompanyId;
            return view('Administrator.ManageCompany')->with(compact('cinnotfoundindatabase', 'CompanyId'));
        }
    }

    public function Managebyindustry(Request $request)
    {
        $request->validate([
            'industry' => 'required',
        ]);

        $Industry = $request->industry;
        $data = Companies::where('Industry', $Industry)->get();
        if (isset($data) && Companies::where('Industry', $Industry)->delete()) {
            foreach ($data as $item) {
                $CompanyId = $item->CompanyId;
                $data = JobPostings::where('CompanyId', $CompanyId)->get();
                JobPostings::where('CompanyId', $CompanyId)->delete();
                foreach ($data as $item) {
                    Applications::where('JobId', $item->JobId)->delete();
                }

            }

            $deleteindustry = $Industry;
            return view('Administrator.ManageCompany')->with(compact('deleteindustry', 'Industry'));
        } else {
            $industrynotfoundindatabase = $Industry;
            return view('Administrator.ManageCompany')->with(compact('industrynotfoundindatabase', 'Industry'));
        }
    }

    public function Managebyenrollment(Request $request)
    {
        $request->validate(
            [
                'StudentId' => 'required'
            ]
        );
        $StudentId = $request->StudentId;
        $student = Students::where('StudentId', $StudentId)->first();
        $data = compact('StudentId', 'student');

        if (isset($student) && $student->delete()) {
            $studentapplications = Applications::where('StudentId', $StudentId)->delete();
            $deletestudent = $StudentId;
            return view('Administrator.ManageStudents')->with(compact('deletestudent', 'StudentId'));
        } else {
            $studentnotfoundindatabase = $StudentId;
            return view('Administrator.ManageStudents')->with(compact('studentnotfoundindatabase', 'StudentId'));
        }
    }

    public function Managebyclass(Request $request)
    {
        $request->validate(
            [
                'Class' => 'required'
            ]
        );
        $Class = $request->Class;
        $class = Students::where('Program', $Class)->get();

        if (isset($class) && Students::where('Program', $Class)->delete()) {
            foreach ($class as $item) {
                $StudentId = $item->StudentId;

                Applications::where('StudentId', $StudentId)->delete();
            }

            $deleteclass = $Class;
            return view('Administrator.ManageStudents')->with(compact('deleteclass', 'Class'));
        } else {
            $classnotfoundindatabase = $Class;
            return view('Administrator.ManageStudents')->with(compact('classnotfoundindatabase', 'Class'));
        }
    }

    public function Placements(Request $request)
    {
        // $request->validate(
        //     [
        //     'PlacementId' => 'required',
        //     'StudentId' => 'required',
        //     'JobId' => 'required',
        //     'DatePlaced' => 'required|date',
        //     'PlacedSalary' => 'required|numeric',
        //     ]);

        $data = Placements::where('PlacementId', $request->PlacementId)->where('StudentId', $request->StudentId)->exists();

        if ($data) {
            $PlacementExists = "Placement Data already exists in our database.";
            return view('Administrator.Placements')->with(compact('PlacementExists'));
        } else {
            $table = new Placements;
            $table->PlacementId = $request->PlacementId;
            $table->StudentId = $request->StudentId;
            $table->JobId = $request->JobId;
            $table->DatePlaced = strval($request->DatePlaced);
            $table->SalaryOffered = strval($request->SalaryOffered);

            if ($table->save()) {
                $Student = $request->StuddentId;
                $success = "Placement Data Added Successfully.";
                return view('Administrator.Placements')->with(compact('success'));
            }
        }
    }

    public function Event(Request $request)
    {
        // $request->validate(
        //     [
        // 'PlacementId' => 'required',
        // 'StudentId' => 'required',
        // 'JobId' => 'required',
        // 'DatePlaced' => 'required|date',
        // 'PlacedSalary' => 'required|numeric',
        // ]);
        $events = Events::all();
        $noofevents = $events->count();
        $data = Events::where('EventId', $request->EventId)->exists();

        if ($data) {
            $EventExists = "Event already exists in our database.";
            $events = Events::all();
            $noofevents = $events->count();
            return view('Administrator.Event')->with(compact('EventExists', 'noofevents', 'events'));
        } else {
            $table = new Events;
            $table->EventId = $request->EventId;
            $table->Name = $request->Name;
            $table->Date = $request->EventDate;
            $table->Description = $request->Description;

            if ($table->save()) {
                $success = "Event is Created Successfully.";
                $events = Events::all();
                $noofevents = $events->count();
                return view('Administrator.Event')->with(compact('success', 'noofevents', 'events'));
            }
        }
    }

    public function EventDelete($EventId)
    {
        $table = Events::find($EventId);

        if (isset($table) && $table->delete()) {
            $events = Events::where('EventId', $EventId)->delete();
            $events = Events::all();
            $noofevents = $events->count();
            $delete = "Event : " . $EventId . " is Deleted Successfully.";
            return view('Administrator.Event')->with(compact('delete', 'noofevents', 'events'));
        }
    }
}