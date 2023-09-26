<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\SectionA;
use App\Models\Attendance\SectionB;
use App\Models\Attendance\SectionC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AllSections extends Controller
{
    public function storeSection(Request $request, $section)
    {
        // Validation rules for attendance
        $validationRules = [
            'school_id' => 'required|numeric|digits:9',
            'name' => 'required',
        ];

        // Determine the appropriate model and table based on the section
        $model = null;

        switch ($section) {
            case 'section-a':
                $model = SectionA::class;
                break;
            case 'section-b':
                $model = SectionB::class;
                break;
            case 'section-c':
                $model = SectionC::class;
                break;
            default:
                return response()->json(['error' => 'Invalid section'], 422);
        }

        // Validate the request data
        $data = $request->validate($validationRules);

        // Check if an attendance record for the same school_id exists
        $existingRecord = $model::where('school_id', $data['school_id'])->first();

        if ($existingRecord) {
            throw ValidationException::withMessages(['school_id' => ['An attendance record already exists for this school ID.']]);
        }

        // Save the attendance record to the corresponding section table
        $model::create([
            'school_id' => $data['school_id'],
            'name' => $data['name'],
            'date' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Attendance recorded successfully']);
    }
}
