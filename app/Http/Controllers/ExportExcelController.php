<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatlab\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllStudentsExport;
use App\Exports\AcademicReports;
use App\Exports\InSessionReport;
use App\personal_info;


class ExportExcelController extends Controller
{

    public function allStudents(){
    	return Excel::download(new AllStudentsExport, 'Students.xlsx');
    }

    public function academicReports(){
    	return Excel::download(new AcademicReports, 'Exam.xlsx');
    }

    public function inSession(){
    	return Excel::download(new InSessionReport, 'InSessionReport.xlsx');
    }
}
