<?php

namespace App\Imports;

use App\Models\ProgressTracker;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgressTrackImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Check for duplicates (based on date + location + activity)
        $exists = ProgressTracker::where('activity', $row['activity'] ?? null)
        ->exists();

        if ($exists) {
            return null; // Skip duplicate
        }

        return new ProgressTracker([
            'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
            'location' => $row['location'],
            'activity' => $row['activity'],
            'shg_covered' => $row['shgs_covered'],
            'member_enrolled' => $row['members_enrolled'],
            'schemes_facilitated' => $row['schemes_facilitated'],
            'legal_docs_processed' => $row['legal_docs_processed'],
        ]);
    }
}
