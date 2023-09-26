<?php

namespace Database\Seeders;

use App\Models\Attendance\SectionA;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionA::create([
            'school_id' => '201903932',
            'name' => 'Christian Franc M. Carvajal',
            'date' => Carbon::now()
        ]);
    }
}
