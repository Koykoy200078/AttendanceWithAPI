<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\SectionA;
use App\Models\Attendance\SectionB;
use App\Models\Attendance\SectionC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AllSectionsAPI extends Controller
{
    public function all()
    {
        // Fetch data from each section (SectionA, SectionB, SectionC)
        $sectionAData = SectionA::with('attendance')->get();
        $sectionBData = SectionB::with('attendance')->get();
        $sectionCData = SectionC::with('attendance')->get();

        // Count the number of attendees in each section
        $sectionACount = SectionA::count();
        $sectionBCount = SectionB::count();
        $sectionCCount = SectionC::count();


        return response()->json([
            'csc200' => [
                'section-a' => [
                    'total_students' => $sectionACount,
                    'data' => $sectionAData,

                ],
                'section-b' => [
                    'total_students' => $sectionBCount,
                    'data' => $sectionBData,
                ],
                'section-c' => [
                    'total_students' => $sectionCCount,
                    'data' => $sectionCData,
                ],
            ]
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // Initialize an empty array to store student data
        $studentData = [];

        // Fetch student data from SectionA if there are matching results
        $sectionAData = SectionA::with('attendance')
            ->where('name', 'like', "%$search%")
            ->get();
        if ($sectionAData->isNotEmpty()) {
            $studentData['Section A'] = $sectionAData->toArray();
        }

        // Fetch student data from SectionB if there are matching results
        $sectionBData = SectionB::with('attendance')
            ->where('name', 'like', "%$search%")
            ->get();
        if ($sectionBData->isNotEmpty()) {
            $studentData['Section B'] = $sectionBData->toArray();
        }

        // Fetch student data from SectionC if there are matching results
        $sectionCData = SectionC::with('attendance')
            ->where('name', 'like', "%$search%")
            ->get();
        if ($sectionCData->isNotEmpty()) {
            $studentData['Section C'] = $sectionCData->toArray();
        }

        return response()->json([
            'csc200' => [
                'total_students' => count($studentData),
                'data' => $studentData,
            ]
        ]);
    }



    // public function storeSection(Request $request, $section)
    // {
    //     // Validation rules for attendance
    //     $validationRules = [
    //         'school_id' => 'required|numeric|digits:9',
    //         'name' => 'required',
    //     ];

    //     // Determine the appropriate model and table based on the section
    //     $model = null;

    //     switch ($section) {
    //         case 'section-a':
    //             $model = SectionA::class;
    //             break;
    //         case 'section-b':
    //             $model = SectionB::class;
    //             break;
    //         case 'section-c':
    //             $model = SectionC::class;
    //             break;
    //         default:
    //             return response()->json(['error' => 'Invalid section'], 422);
    //     }

    //     // Validate the request data
    //     $data = $request->validate($validationRules);

    //     // Check if an attendance record for the same school_id exists
    //     $existingRecord = $model::where('school_id', $data['school_id'])->first();

    //     if ($existingRecord) {
    //         throw ValidationException::withMessages(['school_id' => ['An attendance record already exists for this school ID.']]);
    //     }

    //     // Save the attendance record to the corresponding section table
    //     $model::create([
    //         'school_id' => $data['school_id'],
    //         'name' => $data['name'],
    //         'date' => Carbon::now(),
    //     ]);

    //     return response()->json(['message' => 'Attendance recorded successfully']);
    // }
}
