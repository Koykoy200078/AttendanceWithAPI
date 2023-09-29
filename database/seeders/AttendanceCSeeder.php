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
            ['school_id' => '202202308', 'name' => 'Abrenica, Jay Jovi James B.', 'date' => null],
            ['school_id' => '202202280', 'name' => 'Abria, Mary Joy A.', 'date' => null],
            ['school_id' => '202202282', 'name' => 'Ajoc, John Lloyd P.', 'date' => null],
            ['school_id' => '202202283', 'name' => 'Aldenese, Nicole A.', 'date' => null],
            ['school_id' => '202121427', 'name' => 'Alvarez, Rachel A.', 'date' => null],
            ['school_id' => '202200364', 'name' => 'Bernal, Tamara Faye C.', 'date' => null],
            ['school_id' => '202303536', 'name' => 'Custodio, John Michael L.', 'date' => null], // absent
            ['school_id' => '202200371', 'name' => 'Descatamiento, Shiela Mae A.', 'date' => null],
            ['school_id' => '202303545', 'name' => 'Fabello, Isaac G.', 'date' => null],
            ['school_id' => '202202306', 'name' => 'Garcia, John Clyde B.', 'date' => null],
            ['school_id' => '202200376', 'name' => 'Gomez, Dino C.', 'date' => null],
            ['school_id' => '202202307', 'name' => 'Gonzales, Christian P.', 'date' => null],
            ['school_id' => '202120878', 'name' => 'Gravoso, Judy Ann O.', 'date' => null],
            ['school_id' => '202200377', 'name' => 'Macasukit, Luiguie C.', 'date' => null],
            ['school_id' => '202120890', 'name' => 'Mendez, Angel Mae', 'date' => null], // absent
            ['school_id' => '202202320', 'name' => 'Narbas, Arjay Ejercito', 'date' => null],
            ['school_id' => '201901647', 'name' => 'Santonil, Jun Cyril A.', 'date' => null], // absent
            ['school_id' => '202202339', 'name' => 'Tayros, Sean Ivan', 'date' => null],
            ['school_id' => '202002622', 'name' => 'Veradio, Rex Mikheal', 'date' => null],
            ['school_id' => '202200390', 'name' => 'Villaflores, Joshua S.', 'date' => null],
            ['school_id' => '202202344', 'name' => 'Villegas, Kennith Khember A.', 'date' => null],
        ];

        foreach ($data as $item) {
            SectionC::create($item);
        }
    }
}
