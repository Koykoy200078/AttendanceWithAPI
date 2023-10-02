<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\Attendance\SectionA;
use App\Models\Attendance\SectionB;
use App\Models\Attendance\SectionC;
use Illuminate\Console\Command;

class PopulateAttendanceTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the attendance table with all students';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateToPopulate = now()->toDateString();

        // Populate attendance table for Section A
        $this->populateSectionAttendance(SectionA::class, $dateToPopulate);

        // Populate attendance table for Section B
        $this->populateSectionAttendance(SectionB::class, $dateToPopulate);

        // Populate attendance table for Section C
        $this->populateSectionAttendance(SectionC::class, $dateToPopulate);

        $this->info('Attendance table populated successfully for ' . $dateToPopulate);
    }

    private function populateSectionAttendance($sectionModel, $dateToPopulate)
    {
        $sectionModel::chunk(200, function ($students) use ($dateToPopulate) {
            foreach ($students as $student) {
                // Check if attendance record for the given date already exists
                $existingAttendance = Attendance::where('school_id', $student->school_id)
                    ->whereDate('date', $dateToPopulate)
                    ->first();

                // If attendance record doesn't exist, create a new one
                if (!$existingAttendance) {
                    Attendance::create([
                        'school_id' => $student->school_id,
                        'is_present' => false,
                        'date' => $dateToPopulate,
                    ]);
                }
            }
        });
    }
}
