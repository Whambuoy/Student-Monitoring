<?php
namespace App\Exports;

use App\Students;
use App\Exam1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AcademicReports implements FromCollection, ShouldAutoSize, WithHeadings
{
	public function headings(): array
    {
        return [
            'Registration number',
            'Student name',
            'CIT 3451',
            'CIT 3452',
            'CCS 3350', 
            'BFB 3252',
            'CIT 2252',
            'CIC 3454',
            'CCS 3101',
            'CIT 3451',
            'SPS 3300',
        ];
    }

    public function collection()
    {	
        return Exam1::all('reg_no', 'student_name','unit_code1','unit_code2', 'unit_code3', 'unit_code4', 'unit_code5', 'unit_code6', 'unit_code7', 'unit_code8', 'unit_code9');
    }
}
