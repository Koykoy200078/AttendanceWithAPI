<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AttendanceASeeder::class,
            AttendanceBSeeder::class,
            AttendanceCSeeder::class,
            AttendanceSeeder::class
        ]);
    }
}
