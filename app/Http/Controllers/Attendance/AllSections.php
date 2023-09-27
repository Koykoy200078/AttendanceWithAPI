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
            'school_id' => 'required|numeric|digits:9',
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
        $section = $request->input('section'); // Get the selected section from the form

        // Validate the form data
        $request->validate([
            'school_id' => 'required|numeric|digits:9',
        ]);

        // Find the data with the provided school_id
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

        // If the data with the provided school_id exists, update the record
        if ($existingRecord) {
            // Update the existing record with the current date
            $existingRecord->update([
                'date' => Carbon::now(),
            ]);

            return redirect()->route('attendance.formWeb')->with('success', 'Attendance updated successfully');
        } else {
            // Data does not exist, return an error
            return back()->withErrors(['school_id' => "Record doesn't exist."])->withInput();
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
