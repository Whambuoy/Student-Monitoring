<?php
namespace App\Exports;

use App\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllStudentsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
	public function headings(): array
    {
        return [
            'Registration number',
            'Student name',
            'Gender',
            'Date of birth',
            'Date of admission', 
            'Course',
            'Parent name',
            'Parent phone',
        ];
    }

    public function collection()
    {	
        return Students::all('reg_no', 'student_name','gender','date_of_birth', 'date_of_admission', 'course', 'parent_name', 'parent_phone');
    }
}
