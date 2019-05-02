<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personal_info;
use App\Financials;
use App\Discipline;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = personal_info::all(); 
        $disciplines = Discipline::all();

        $in_session = $disciplines->filter(function($discipline){
            return $discipline->status == "In session";
        });

        $suspended = $disciplines->filter(function($discipline){
            return $discipline->status == "Suspended";
        });
        
        $expelled = $disciplines->filter(function($discipline){
            return $discipline->status == "Expelled";
        });

        $statistics = array(
            'in_session' => count($in_session),
            'suspended' => count($suspended),
            'expelled' => count($expelled)
             );

        return view('dashboard.dashboard')->with('students', $students)->with('statistics', $statistics);
    }

    public function students_show()
    {
        $students = personal_info::all(); 
        return view('dashboard.students_show')->with('students', $students);
    }

    public function student_add()
    {
        return view('dashboard.student_add');
    }

    public function student_store(Request $request)
    {
        //validate that every field is filled before submitting
        $this->validate($request,[
            'reg_no' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_admission' => 'required',
            'course' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required'
        ]);
 
        $personal_info = new personal_info;
        $financial = new Financials;
        $discipline = new Discipline;

        $personal_info->reg_no = $request->input('reg_no');
        $personal_info->student_name = $request->input('student_name');
        $personal_info->gender = $request->input('gender');
        $personal_info->date_of_birth = $request->input('date_of_birth');
        $personal_info->date_of_admission = $request->input('date_of_admission');
        $personal_info->course = $request->input('course');
        $personal_info->parent_name = $request->input('parent_name');
        $personal_info->parent_phone = $request->input('parent_phone');

        #creates financial record of newly added student
        $financial->reg_no = $personal_info->reg_no;
        $financial->student_name = $personal_info->student_name;
        $financial->amount_to_be_paid = 0;
        $financial->amount_paid = 0;
        $financial->balance = 0;
        $financial->save();

        #creates discipline record of newly added student
        $discipline->reg_no = $personal_info->reg_no;
        $discipline->student_name = $personal_info->student_name;
        $discipline->status = "In session";
        $discipline->save();

        $personal_info->save();



        return redirect('dashboard')->with('success', 'Student added successfully');
    }

    public function student_edit($id)
    {
        $student = personal_info::findOrFail($id);
        return view('dashboard.student_edit')->with('student', $student);
    }

    public function student_update(Request $request, $id)
    {
        //validate that every field is filled before submitting
        $this->validate($request,[
            'reg_no' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_admission' => 'required',
            'course' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required'
        ]);

        $personal_info = personal_info::find($id);

        $personal_info->reg_no = $request->input('reg_no');
        $personal_info->student_name = $request->input('student_name');
        $personal_info->gender = $request->input('gender');
        $personal_info->date_of_birth = $request->input('date_of_birth');
        $personal_info->date_of_admission = $request->input('date_of_admission');
        $personal_info->course = $request->input('course');
        $personal_info->parent_name = $request->input('parent_name');
        $personal_info->parent_phone = $request->input('parent_phone');

        $personal_info->save();
        return redirect('student')->with('success', 'Student personal information updated successfully');
    }

    public function student_search(Request $request){
        $personal_info = personal_info::all();

        foreach ($personal_info as $student) {
            if ($request->input('search-item') == $student->reg_no){
                return view('dashboard.student_search')->with('student', $student);
            }
        }
    }

    public function financials_show(){
        $financials = Financials::all();
        return view('dashboard.financials_show')->with('financials', $financials);
    }

    public function financials_add(){
        $students = personal_info::all();
        $financials = Financials::all();
        return view('dashboard.financials_add')->with('students', $students)->with('financials', $financials);
    }

    public function financials_store(Request $request){
        $this->validate($request, [
            'reg_no' => 'required',
            'student_name' => 'required',
            'amount_to_be_paid' => 'required',
            'amount_paid' => 'required',
            'balance' => 'required'
        ]);

        #stores student->id submitted through registration filled and uses it to get student from student(personal_info) table
        $studentID = $request->input('reg_no');

        #student with corresponding id is retrieved so that their registration number can be retrieved for storage
        $student = personal_info::findOrFail($studentID);

        $financial = new Financials;
        $financial->reg_no = $student->reg_no;
        $financial->student_name = $request->input('student_name');
        $financial->amount_to_be_paid = $request->input('amount_to_be_paid');
        $financial->amount_paid = $request->input('amount_paid');
        $financial->balance = $request->input('balance');
        $financial->save();

        return redirect('/financials')->with('success', "Financials successfully added");

    }

    public function financials_edit(Request $request, $id){
        $financial = Financials::findOrFail($id);
        return view('dashboard.financials_edit')->with('financial', $financial);
    }

    public function financials_update(Request $request, $id){
        $this->validate($request, [
            'amount_to_be_paid' => 'required',
            'amount_paid' => 'required'
        ]);

        $financial = Financials::findOrFail($id);
        $financial->reg_no = $request->input('reg_no');
        $financial->student_name = $request->input('student_name');
        $financial->amount_to_be_paid = $request->input('amount_to_be_paid');
        $financial->amount_paid = $request->input('amount_paid');
        $financial->balance = $request->input('balance');
        $financial->save();

        return redirect('/financials')->with('success', 'Financials successfully updated');
    }

    public function getFinancialInfo($id){
        $student = personal_info::findOrFail($id);
        return $student->student_name;
    }




    public function discipline_show(){
        $discipline = Discipline::all();
        return view('dashboard.discipline_show')->with('discipline', $discipline);
    }

    public function discipline_edit(Request $request, $id){
        //Find discipline record
        $discipline = Discipline::findOrFail($id);
        return view('dashboard.discipline_edit')->with('discipline', $discipline);
    }

    public function discipline_update(Request $request, $id){
        //find discipine record
        $this->validate($request, [
            'status' => 'required'
        ]);

        $discipline = Discipline::findOrFail($id);
        $discipline->reg_no = $request->input('reg_no');
        $discipline->student_name = $request->input('student_name');
        $discipline->status = $request->input('status');

        $discipline->save();

        return redirect('/discipline')->with('success', 'Discipline successfully updated');


    }

    public function updates_show(){
        return view('dashboard.updates_show');
    }

    public function updates_add(){
        return view('dashboard.update_add');
    }

    public function test(){
        $financial = Financials::findorfail(2);
        dd($financial)->student;
        return view('dashboard.test');
    }
}
