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
        $names = [
            'Cañete, John Adnhel E.',
            'Galleon Oliver P.',
            'Jumawan, Lysa Mae A. ',
            'Ceriales, Aiko',
            'Almirante, Jann Louie',
            'Arceño, Jayson',
            'Cafino, Randy',
            'Jonathan Cantal Jr.',
            'Epan Christian Ray',
            'Austero Crank Neil R.',
            'Radoc, Cyrell Jane E.',
            'Francis Clinton Dorio',
            'John Howard Elmaco',
            'Lee Cliford Eluna',
            'Wingel Antonnette Ention',
            'ESTRELLADO, JAY, Z.',
            'Paster, Jerico P.',
            'Deatras, Keizharra',
            'Delara, Kriste Jo',
            'Calpis, Lorenzo R. Jr.',
            'Santillan Lorie Ann Mae',
            'Pasague Ma. Cristina M.',
            'Ronin Allyson Manso',
            'Des Jozef Mariano',
            'Magsayo, Mary Paola',
            'Sabejon Matt Ian',
            'Bantillo Phoebe Mariz',
            'Tubongbanua Reden D.',
            'RUSIANA Shane Mark',
        ];

        foreach ($names as $name) {
            SectionA::create([
                'school_id' => '000000000',
                'name' => $name,
                'date' => null,
            ]);
        }

        // SectionA::create([
        //     [
        //         'school_id' => '202101696',
        //         'name' => 'Almirante, Jann Louie Q.',
        //         'date' => null,
        //     ],
        //     [
        //         'school_id' => '202203013',
        //         'name' => 'Arceño, Jayson E.',
        //         'date' => null,
        //     ],
        //     [
        //         'school_id' => '202102022',
        //         'name' => 'Austero, Crank Neil R.',
        //         'date' => null,
        //     ],
        //     [
        //         'school_id' => '202202286',
        //         'name' => 'Bantillo, Phoebe Mariz Q.',
        //         'date' => null,
        //     ],
        //     [
        //         'school_id' => '202120854',
        //         'name' => 'Bondad, Don Marc P.',
        //         'date' => null,
        //     ],
        //     [
        //         'school_id' => '201905138',
        //         'name' => 'Cafino, Randy S.',
        //         'date' => null,
        //     ],
        // ]);
    }
}
