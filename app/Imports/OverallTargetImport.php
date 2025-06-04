<?php

namespace App\Imports;

use App\Models\OverallTargetvsDeliverables;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OverallTargetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $deliverables = $row['deliverables'] ?? null;
        if (empty($deliverables)) {
            return null;
        }

        $target = isset($row['target_to_be_achieved']) ? (float) $row['target_to_be_achieved'] : 0;
        $achieved = 0;

        // Slice the values for timeline columns (index 3 to 19)
        $monthlyValues = array_slice($row, 3, 17);

        // Loop over all values (indexed + associative) to sum properly
        foreach ($monthlyValues as $value) {
            if (is_numeric($value)) {
                $achieved += (float) $value;
            } elseif (is_string($value)) {
                $trimmed = trim($value);

                // Skip formula cells like =SUM(...)
                if (preg_match('/^=SUM\(/i', $trimmed)) {
                    continue;
                }

                // Extract and sum numeric values from other strings
                preg_match_all('/\d+(\.\d+)?/', $trimmed, $matches);
                foreach ($matches[0] as $num) {
                    $achieved += (float) $num;
                }
            }
        }

        // dd([
        //     'sum' => $achieved,
        //     'used_total' => $row[20] ?? 'not present',
        //     'all_values' => $monthlyValues,
        // ]);

        return new OverallTargetvsDeliverables([
            'key_indicator' => $deliverables,
            'target' => $target,
            'achieved' => $achieved,
            'completion' => $target > 0 ? round(($achieved / $target) * 100, 2) : 0,
            'remarks' => $target > 0
                ? ($achieved >= $target
                    ? 'Completed'
                    : ($target - $achieved) . ' in progress')
                : null,
        ]);
    }
}
