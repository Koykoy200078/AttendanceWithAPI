<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\SectionA;
use App\Models\Attendance\SectionB;
use App\Models\Attendance\SectionC;
use App\Models\PostMethod;
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

    // public function getGroups()
    // {
    //     // Fetch data from each section (SectionA, SectionB, SectionC)
    //     $sectionAData = SectionA::all()->toArray();
    //     $sectionBData = SectionB::all()->toArray();
    //     $sectionCData = SectionC::all()->toArray();

    //     // Add section information to the student data
    //     $sectionAData = $this->addSectionInfo($sectionAData, 'Section A');
    //     $sectionBData = $this->addSectionInfo($sectionBData, 'Section B');
    //     $sectionCData = $this->addSectionInfo($sectionCData, 'Section C');

    //     // Merge the data from all sections into a single array
    //     $mergedData = array_merge($sectionAData, $sectionBData, $sectionCData);

    //     // Shuffle the merged data randomly
    //     shuffle($mergedData);

    //     // Divide the shuffled data into groups of 5 students each
    //     $groupedData = array_chunk($mergedData, 5);

    //     // Create an associative array to represent the groups
    //     $groups = [];
    //     foreach ($groupedData as $index => $group) {
    //         $groupName = 'Group ' . ($index + 1);
    //         $groups[$groupName] = $group;
    //     }

    //     // Check if there are remaining students
    //     $remainingStudents = count($mergedData) - (count($groupedData) * 5);

    //     // If there are remaining students, add them to the last group
    //     if ($remainingStudents > 0) {
    //         $lastGroupName = 'Group ' . count($groupedData);
    //         for ($i = 0; $i < $remainingStudents; $i++) {
    //             array_push($groups[$lastGroupName], $mergedData[$i]);
    //         }
    //     }

    //     return response()->json([
    //         'csc200' => [
    //             'groups' => $groups,
    //         ],
    //     ]);
    // }

    // Helper function to add section information to student data
    // private function addSectionInfo($data, $sectionName)
    // {
    //     foreach ($data as &$student) {
    //         $student['section'] = $sectionName;
    //     }
    //     return $data;
    // }
    // public function all()
    // {
    //     // Fetch data from each section (SectionA, SectionB, SectionC)
    //     $data = PostMethod::all();


    //     return response()->json([

    //         'message' => $data

    //     ]);
    // }

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

    public function searchDate(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request
        $date = $request->input('date'); // Get the date from the request

        // Initialize an empty array to store student data
        $studentData = [];

        // Fetch student data from SectionA if there are matching results
        $sectionAData = SectionA::with(['attendance' => function ($query) use ($date) {
            $query->where('date', $date); // Filter attendance data for the specified date
        }])->where('name', 'like', "%$search%")->get();

        if ($sectionAData->isNotEmpty()) {
            $studentData['Section A'] = $sectionAData->toArray();
        }

        // Fetch student data from SectionB if there are matching results
        $sectionBData = SectionB::with(['attendance' => function ($query) use ($date) {
            $query->where('date', $date); // Filter attendance data for the specified date
        }])->where('name', 'like', "%$search%")->get();

        if ($sectionBData->isNotEmpty()) {
            $studentData['Section B'] = $sectionBData->toArray();
        }

        // Fetch student data from SectionC if there are matching results
        $sectionCData = SectionC::with(['attendance' => function ($query) use ($date) {
            $query->where('date', $date); // Filter attendance data for the specified date
        }])->where('name', 'like', "%$search%")->get();

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



    // public function create(Request $request)
    // {
    //     $validate = $request->validate([
    //         'message' => 'required|string'
    //     ]);

    //     $post = new PostMethod();
    //     $post->message = $validate['message'];
    //     $post->save();

    //     return response()->json([
    //         "data" => $post->message,
    //         'message' => 'Data saved successfully'
    //     ]);
    // }
}
