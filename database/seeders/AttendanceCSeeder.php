<?php

namespace Database\Seeders;

use App\Models\Attendance\SectionC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Mary Joy Abria',
            'Gonzales, Christian P.',
            'Gomez, Dino C.',
            'isaac fabello',
            'John Clyde Garcia',
            'Judy Ann Gravoso',
            'Abrenica Jay Jovi James',
            'Ajoc, John Lloyd',
            'Santonil Jun Cyril A.',
            'Macasukit, Luiguie',
            'Arjay Narbas',
            'Aldenese Nicole',
            'Carlton James Ojales',
            'Alvarez Rachel',
            'Veradio, Rex Mikheal',
            'Tayros, Sean Ivan',
            'Descatamiento, Shiela Mae A.',
            'BERNAL, TAMARA FAYE',
            'Joshua Villaflores',
            'Kennith Khember “VILLEGAS, KENNITH A” Villegas',
        ];

        foreach ($names as $name) {
            SectionC::create([
                'school_id' => '000000000', // Adjust the school_id as needed
                'name' => $name,
                'date' => null,
            ]);
        }
    }
}
