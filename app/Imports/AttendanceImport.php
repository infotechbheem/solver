<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Attendance([
            'date'               => $row['date'],
            'project_name'       => $row['project_name'],
            'project_number'     => $row['project_number'],
            'title_of_project'   => $row['title_of_project'],
            'duration_of_project' => $row['duration_of_project'],
            'emp_name'           => $row['employee_name'],   // assuming Excel says 'Employee Name'
            'designation'        => $row['designation'],
            // 'emp_id'             => $row['employee_id'],     // assuming Excel says 'Employee ID'
            'hours_spent'        => $row['hours_spent'],
            'days'               => $row['days'],
            'month'              => $row['month'],
            'task_performed'     => $row['task_performed'],
        ]);
    }
}
