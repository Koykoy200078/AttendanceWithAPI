<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Attendance\SectionA;
use App\Models\Attendance\SectionB;
use App\Models\Attendance\SectionC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AllSections extends Controller
{
    public function attendanceFormWeb()
    {
        return view('welcome');
    }

    public function registerFormWeb()
    {
        return view('register');
    }

    public function registerSectionWeb(Request $request)
    {
        $section = $request->input('section'); // Get the selected section from the form

        // Validate the form data
        $request->validate([
            'school_id' => 'required|numeric',
            'name' => 'required',
        ]);

        // Check if the data already exists
        $existingRecord = null;

        switch ($section) {
            case 'section-a':
                $existingRecord = SectionA::where('school_id', $request->input('school_id'))->first();
                break;
            case 'section-b':
                $existingRecord = SectionB::where('school_id', $request->input('school_id'))->first();
                break;
            case 'section-c':
                $existingRecord = SectionC::where('school_id', $request->input('school_id'))->first();
                break;
            default:
                return back()->withErrors(['section' => 'Invalid section'])->withInput();
        }

        // If the data already exists, return an error message
        if ($existingRecord) {
            return back()->withErrors(['school_id' => 'A record already exists for this school ID'])->withInput();
        }

        // Create a new record
        $data = [
            'school_id' => $request->input('school_id'),
            'name' => $request->input('name'),
            'date' => Carbon::now(),
        ];

        switch ($section) {
            case 'section-a':
                SectionA::create($data);
                break;
            case 'section-b':
                SectionB::create($data);
                break;
            case 'section-c':
                SectionC::create($data);
                break;
            default:
                return back()->withErrors(['section' => 'Invalid section'])->withInput();
        }

        return redirect()->route('attendance.registerFormWeb')->with('success', 'Student successfully recorded');
    }

    public function storeSectionWeb(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'school_id' => 'required|numeric|digits_between:9,10',
        ]);

        if ($validator->fails()) {
            return redirect()->route('attendance.formWeb')
                ->withErrors($validator)
                ->withInput();
        }

        $section = $request->input('section');
        $schoolId = $request->input('school_id');

        try {
            // Find the data with the provided school_id
            $existingRecord = null;

            switch ($section) {
                case 'section-a':
                    $existingRecord = SectionA::where('school_id', $schoolId)->first();
                    break;
                case 'section-b':
                    $existingRecord = SectionB::where('school_id', $schoolId)->first();
                    break;
                case 'section-c':
                    $existingRecord = SectionC::where('school_id', $schoolId)->first();
                    break;
            }

            // If the data with the provided school_id exists, update the record
            if ($existingRecord) {
                // Check if a record already exists in the Attendance table for today's date
                $attendanceRecord = Attendance::where('school_id', $schoolId)
                    ->first();

                if ($attendanceRecord) {
                    return redirect()->route('attendance.formWeb')
                        ->withErrors(['school_id' => 'Student already recorded for today.'])
                        ->withInput();
                }

                // Create a new record in the Attendance table with today's date
                Attendance::create([
                    'school_id' => $schoolId,
                    'is_present' => true
                ]);

                return redirect()->route('attendance.formWeb')
                    ->with('success', 'Attendance updated successfully');
            } else {
                // Data does not exist, return an error
                return redirect()->route('attendance.formWeb')
                    ->withErrors(['school_id' => "Record doesn't exist."])
                    ->withInput();
            }
        } catch (\Exception $e) {
            // Handle any exceptions here
            return redirect()->route('attendance.formWeb')
                ->withErrors(['database' => 'An error occurred while updating the attendance.'])
                ->withInput();
        }
    }




    public function exportData()
    {
        // Get the current date for the file name
        $currentDate = now()->format('Y-m-d');

        // Create a dynamic file name
        $filename = "export_data_{$currentDate}.txt";
        $file = public_path($filename); // You can change the path as needed

        $fileContent = '';

        // Section A
        $dataA = SectionA::select('school_id', 'name', 'date')->whereNotNull('date')->orderBy('name')->get();
        if ($dataA->isNotEmpty()) {
            $fileContent .= "Section A\n";
            foreach ($dataA as $item) {
                $fileContent .= $item->school_id . ', ' . $item->name . ', ' . $item->date . PHP_EOL;
            }
        }

        // Section B
        $dataB = SectionB::select('school_id', 'name', 'date')->whereNotNull('date')->orderBy('name')->get();
        if ($dataB->isNotEmpty()) {
            $fileContent .= "\nSection B\n";
            foreach ($dataB as $item) {
                $fileContent .= $item->school_id . ', ' . $item->name . ', ' . $item->date . PHP_EOL;
            }
        }

        // Section C
        $dataC = SectionC::select('school_id', 'name', 'date')->whereNotNull('date')->orderBy('name')->get();
        if ($dataC->isNotEmpty()) {
            $fileContent .= "\nSection C\n";
            foreach ($dataC as $item) {
                $fileContent .= $item->school_id . ', ' . $item->name . ', ' . $item->date . PHP_EOL;
            }
        }

        file_put_contents($file, $fileContent);

        // Return a response to download the file with the dynamic file name
        return response()->download($file, $filename)->deleteFileAfterSend(true);
    }
}
