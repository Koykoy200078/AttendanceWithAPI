<?php

namespace Database\Seeders;

use App\Models\Attendance\SectionB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Carvajal, Juan Antonio E.',
            'Silot, Chris Albert S.',
            'Lou Andre Carriaga',
            'Lou Vincent Carriaga',
            'Leñohan, Cheny Ann B.',
            'Bora, Christian R.',
            'Landazabal Cristy Jane B.',
            'Labrador, Dona Fearl L.',
            'LACHICA, GEO MAR T.',
            'Olasiman, Grant Adriane M.',
            'Catada Jasmin',
            'Cadeliña, Jee Lu',
            'Desoacido, Jessie',
            'Vidal, Johnrel L.',
            'Cabugnason Justine',
            'Ragay, Kenth S.',
            'Jerric Manangcay',
            'Dayot Marjorie B.',
            'Banjao, Maven',
            'Pinanonang Neil G.',
            'Jessa Mae Quibo',
            'Estrada, Ralph Lawrenz',
            'Partosa Ricky boy M.',
            'Aniñon, Ryan',
            'John Leonil Silva',
            'Princess Celine Trumata',
            'Opo Tyler Christian',
            'Azel Ryan Velonta',
        ];

        foreach ($names as $name) {
            SectionB::create([
                'school_id' => '000000000', // Adjust the school_id as needed
                'name' => $name,
                'date' => null,
            ]);
        }
    }
}
