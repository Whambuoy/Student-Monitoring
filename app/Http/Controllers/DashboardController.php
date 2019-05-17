<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Financials;
use App\Discipline;
use App\Update;
use App\Exam1;

use DB;
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
        $students = Students::all(); 
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
        $students = Students::all(); 
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
 
        $Students = new Students;
        $financial = new Financials;
        $discipline = new Discipline;
        $results = new Exam1;

        $Students->reg_no = $request->input('reg_no');
        $Students->student_name = $request->input('student_name');
        $Students->gender = $request->input('gender');
        $Students->date_of_birth = $request->input('date_of_birth');
        $Students->date_of_admission = $request->input('date_of_admission');
        $Students->course = $request->input('course');
        $Students->parent_name = $request->input('parent_name');
        $Students->parent_phone = $request->input('parent_phone');

        #creates financial record of newly added student
        $financial->reg_no = $Students->reg_no;
        $financial->student_name = $Students->student_name;
        $financial->amount_to_be_paid = 0;
        $financial->amount_paid = 0;
        $financial->balance = 0;
        $financial->save();

        #creates discipline record of newly added student
        $discipline->reg_no = $Students->reg_no;
        $discipline->student_name = $Students->student_name;
        $discipline->status = "In session";
        $discipline->save();

        #creates exa results for student
        $results->reg_no = $Students->reg_no;
        $results->student_name = $Students->student_name;
        $results->unit_code1 = "N/A";
        $results->unit_code2 = "N/A";
        $results->unit_code3 = "N/A";
        $results->unit_code4 = "N/A";
        $results->unit_code5 = "N/A";
        $results->unit_code6 = "N/A";
        $results->unit_code7 = "N/A";
        $results->unit_code8 = "N/A";
        $results->unit_code9 = "N/A";
        $results->save();

        $Students->save();



        return redirect('dashboard')->with('success', 'Student added successfully');
    }

    public function restrictDuplicate(Request $request){
        $q = $request->input('q');

        $reg_no = str_replace('-', '/', $q);
        $students = Students::all();

        foreach ($students as $student) {
            if ($student->reg_no == $reg_no){
                return "Registration number already exists";
                break;

            }
        }
    }

    public function student_edit($id)
    {
        $student = Students::findOrFail($id);
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

        $Students = Students::find($id);

        $Students->reg_no = $request->input('reg_no');
        $Students->student_name = $request->input('student_name');
        $Students->gender = $request->input('gender');
        $Students->date_of_birth = $request->input('date_of_birth');
        $Students->date_of_admission = $request->input('date_of_admission');
        $Students->course = $request->input('course');
        $Students->parent_name = $request->input('parent_name');
        $Students->parent_phone = $request->input('parent_phone');

        $Students->save();
        return redirect('student')->with('success', 'Student personal information updated successfully');
    }

    public function student_search(Request $request){
        $Students = Students::all();

        foreach ($Students as $student) {
            if ($request->input('search-item') == $student->reg_no){
                return view('dashboard.student_search')->with('student', $student);
            }
        }
    }


    public function in_session(){
        $status = 'In session';
        $url = 'in_session';
        $students_all = Students::all();
        $disciplines = Discipline::all();
        $in_session = $disciplines->filter(function($discipline){
            return $discipline->status == "In session";
        });

        return view('dashboard.analytics')->with('statuses', $in_session)->with('students', $students_all)->with('status', $status)->with('url', $url);
    }

    public function suspended(){
        $status = 'Suspended';
        $students_all = Students::all();
        $disciplines = Discipline::all();
        $in_session = $disciplines->filter(function($discipline){
            return $discipline->status == "Suspended";
        });

        return view('dashboard.analytics')->with('statuses', $in_session)->with('students', $students_all)->with('status', $status);      
    }

    public function expelled(){
        $status = 'Expelled';
        $students_all = Students::all();
        $disciplines = Discipline::all();
        $in_session = $disciplines->filter(function($discipline){
            return $discipline->status == "Expelled";
        });

        return view('dashboard.analytics')->with('statuses', $in_session)->with('students', $students_all)->with('status', $status);      
    }



    //Exam functions
    public function exams_results(){
        $exam1 = Exam1::all();
        return view('dashboard.results_view')->with('exam1', $exam1);
    }

     public function exams_edit($id){
        $student = Exam1::findOrFail($id);
        return view('dashboard.results_edit')->with('student', $student);
    }   

    public function exams_update(Request $request, $id){
        $results = Exam1::findOrFail($id);
        $results->reg_no = $request->input('reg_no');
        $results->student_name = $request->input('student_name');
        $results->unit_code1 = $request->input('unit_code1');
        $results->unit_code2 = $request->input('unit_code2');
        $results->unit_code3 = $request->input('unit_code3');
        $results->unit_code4 = $request->input('unit_code4');
        $results->unit_code5 = $request->input('unit_code5');
        $results->unit_code6 = $request->input('unit_code6');
        $results->unit_code7 = $request->input('unit_code7');
        $results->unit_code8 = $request->input('unit_code8');
        $results->unit_code9 = $request->input('unit_code9');
        $results->save();

        return redirect('/exams')->with('success', 'Results updated successfully');
    }












    public function exam_add(){
        return view('dashboard.exam_add');
    }

    public function exam_store(Request $request){
        //store added exam to exams table
        $this->validate($request, [
            'exam_title' =>'required',
            'units_taken' => 'required'
        ]);
        $exam = new Exams;
        $exam->exam_title = $request->input('exam_title');
        $exam->units_taken = $request->input('units_taken');

        $exam->unit_code1 = "N/A";
        $exam->unit_code2 = "N/A";
        $exam->unit_code3 = "N/A";
        $exam->unit_code4 = "N/A";
        $exam->unit_code5 = "N/A";
        $exam->unit_code6 = "N/A";
        $exam->unit_code7 = "N/A";
        $exam->unit_code8 = "N/A";
        $exam->unit_code9 = "N/A";

        $exam->save();

        return redirect('/exams/add/units/'.$exam->id)->with('success', 'Exam successfully added');


    }

    public function exam_units_add($id){
        $exam = Exams::findOrFail($id);
        $units_taken = (int)$exam->units_taken;
        return view('dashboard.exam_units_add')->with('limit', $units_taken)->with('exam', $exam);
    }

    public function exam_units_store(Request $request, $id){
        $exam = Exams::findOrFail($id);

        $exam->unit_code1 = $request->input('unit_code1');
        $exam->unit_code2 = $request->input('unit_code2');
        $exam->unit_code3 = $request->input('unit_code3');
        $exam->unit_code4 = $request->input('unit_code4');
        $exam->unit_code5 = $request->input('unit_code5');
        $exam->unit_code6 = $request->input('unit_code6');
        $exam->unit_code7 = $request->input('unit_code7');
        $exam->unit_code8 = $request->input('unit_code8');
        $exam->unit_code9 = $request->input('unit_code9');

        /**
        $table_name = str_replace(' ', '_', $exam->exam_title);
        //create table of exam added
        $query = 'CREATE TABLE' .$table_name(reg_no var_char(50),
                student_name var_char(50),
                $exam->unit_code1 int(10),
                $exam->unit_code2 int(10),
                $exam->unit_code3 int(10),
                $exam->unit_code4 int(10),
                $exam->unit_code5 int(10),
                $exam->unit_code6 int(10),
                $exam->unit_code7 int(10),
                $exam->unit_code8 int(10),
                $exam->unit_code9 int(10),

    );
        $create_table = DB::statement($query);
**/
        $exam->save();
        return redirect('/exams')->with('success', 'Units successfully added!');

    }

    public function delete_exam($id){
        $exam = Exams::findOrFail($id);
        $exam->delete();
        return redirect('exams')->with('error', 'Exam discarded');
    }

    public function exam_restrictDuplicate(Request $request){
        $q = $request->input('q');

        $reg_no = str_replace('-', ' ', $q);
        $exams = Exams::all();
        foreach ($exams as $exam) {
            if ($exam->exam_title == $reg_no){
                return "Exam title already exists";
                break;

            }
        }
    }




    public function financials_show(){
        $financials = Financials::all();
        return view('dashboard.financials_show')->with('financials', $financials);
    }

    public function financials_add(){
        $students = Students::all();
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

        #stores student->id submitted through registration filled and uses it to get student from student(Students) table
        $studentID = $request->input('reg_no');

        #student with corresponding id is retrieved so that their registration number can be retrieved for storage
        $student = Students::findOrFail($studentID);

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
        $student = Students::findOrFail($id);
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
        $updates = Update::all();

        $sent = $updates->filter(function($updates){
            return $updates->sent == "Yes";
        });

        return view('dashboard.updates_show')->with('updates', $updates)->with('sent', $sent);
    }

    public function updates_add(){
        return view('dashboard.update_add');
    }

    public function updates_store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'message' => 'required'
        ]);

        $update = new Update;
        $update->title = $request->input('title');
        $update->message = $request->input('message');
        $update->category = $request->input('category');
        $update->sent = "No";
        $update->save();

        return redirect('/updates')->with('success', 'Update successfully added');
    }

    public function updates_edit(Request $request, $id){
        //Find discipline record
        $update = Update::findOrFail($id);
        return view('dashboard.update_edit')->with('update', $update);
    }

    public function updates_update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'message' => 'required'
        ]);

        $update = Update::findOrFail($id);
        $update->title = $request->input('title');
        $update->message = $request->input('message');
        $update->category = $request->input('category');
        $update->save();

        return redirect('/updates')->with('success', 'Update successfully updated');
    }

    public function updates_delete(Request $request, $id){
        //Find discipline record
        $update = Update::findOrFail($id);
        $update->delete();
        return redirect('/updates')->with('success', 'Update successfully deleted');
    }

    public function test(){
        $financial = Financials::findorfail(2);
        dd($financial)->student;
        return view('dashboard.test');
    }
}
