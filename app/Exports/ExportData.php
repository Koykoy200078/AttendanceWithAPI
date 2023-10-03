<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportData implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        // Query your data here
        $dataA = DB::table('section_a_s')
            ->select('section_a_s.school_id', 'section_a_s.name', 'attendances.date')
            ->join('attendances', 'section_a_s.school_id', '=', 'attendances.school_id')
            ->whereNotNull('attendances.date')
            ->orderBy('section_a_s.name')
            ->get();

        $dataB = DB::table('section_b_s')
            ->select('section_b_s.school_id', 'section_b_s.name', 'attendances.date')
            ->join('attendances', 'section_b_s.school_id', '=', 'attendances.school_id')
            ->whereNotNull('attendances.date')
            ->orderBy('section_b_s.name')
            ->get();

        $dataC = DB::table('section_c_s')
            ->select('section_c_s.school_id', 'section_c_s.name', 'attendances.date')
            ->join('attendances', 'section_c_s.school_id', '=', 'attendances.school_id')
            ->whereNotNull('attendances.date')
            ->orderBy('section_c_s.name')
            ->get();

        return $dataA->concat($dataB)->concat($dataC);
    }

    public function headings(): array
    {
        // Define the column headings
        return [
            'School ID',
            'Name',
            'Date',
        ];
    }
}
