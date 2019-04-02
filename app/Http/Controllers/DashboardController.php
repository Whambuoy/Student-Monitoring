<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personal_info;

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
        return view('dashboard.dashboard');
    }
    public function students_show()
    {
        $students = personal_info::all(); 
        return view('dashboard.students_show')->with('students', $students);
    }
    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $personal_info = new personal_info;

        $personal_info->reg_no = $request->input('reg_no');
        $personal_info->student_name = $request->input('student_name');
        $personal_info->gender = $request->input('gender');
        $personal_info->date_of_birth = $request->input('date_of_birth');
        $personal_info->date_of_admission = $request->input('date_of_admission');
        $personal_info->course = $request->input('course');
        $personal_info->parent_name = $request->input('parent_name');
        $personal_info->parent_phone = $request->input('parent_phone');

        $personal_info->save();
        return redirect('dashboard')->with('success', 'Student added successfully');
    }
    public function edit($id)
    {
        $student = personal_info::find($id);
        return view('dashboard.update')->with('student', $student);
    }
}
