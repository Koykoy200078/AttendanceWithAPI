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
        $data = [
            ['school_id' => '202202308', 'name' => 'Abrenica, Jay Jovi James B.'],
            ['school_id' => '202202280', 'name' => 'Abria, Mary Joy A.'],
            ['school_id' => '202202282', 'name' => 'Ajoc, John Lloyd P.'],
            ['school_id' => '202202283', 'name' => 'Aldenese, Nicole A.'],
            ['school_id' => '202121427', 'name' => 'Alvarez, Rachel A.'],
            ['school_id' => '202200364', 'name' => 'Bernal, Tamara Faye C.'],
            ['school_id' => '202303536', 'name' => 'Custodio, John Michael L.'], // absent
            ['school_id' => '202200371', 'name' => 'Descatamiento, Shiela Mae A.'],
            ['school_id' => '202303545', 'name' => 'Fabello, Isaac G.'],
            ['school_id' => '202202306', 'name' => 'Garcia, John Clyde B.'],
            ['school_id' => '202200376', 'name' => 'Gomez, Dino C.'],
            ['school_id' => '202202307', 'name' => 'Gonzales, Christian P.'],
            ['school_id' => '202120878', 'name' => 'Gravoso, Judy Ann O.'],
            ['school_id' => '202200377', 'name' => 'Macasukit, Luiguie C.'],
            ['school_id' => '202120890', 'name' => 'Mendez, Angel Mae'], // absent
            ['school_id' => '202202320', 'name' => 'Narbas, Arjay Ejercito'],
            ['school_id' => '201901647', 'name' => 'Santonil, Jun Cyril A.'], // absent
            ['school_id' => '202202339', 'name' => 'Tayros, Sean Ivan'],
            ['school_id' => '202002622', 'name' => 'Veradio, Rex Mikheal'],
            ['school_id' => '202200390', 'name' => 'Villaflores, Joshua S.'],
            ['school_id' => '202202344', 'name' => 'Villegas, Kennith Khember A.'],
        ];

        foreach ($data as $item) {
            SectionC::create($item);
        }
    }
}
