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
        $data = [
            ['school_id' => '202200357', 'name' => 'Aniñon, Ryan S.'],
            ['school_id' => '202200360', 'name' => 'Banjao, Maven'],
            ['school_id' => '202200365', 'name' => 'Bora, Christian R.'],
            ['school_id' => '202200366', 'name' => 'Cabugnason, Justine C.'],
            ['school_id' => '202202290', 'name' => 'Cadeliña, Jee Lu L.'],
            ['school_id' => '202202293', 'name' => 'Carriaga, Lou Andre V.'],
            ['school_id' => '202202294', 'name' => 'Carriaga, Lou Vincent V'],
            ['school_id' => '202202295', 'name' => 'Carvajal, Juan Antonio E.'],
            ['school_id' => '202200367', 'name' => 'Catada, Jasmin F.'],
            ['school_id' => '202200369', 'name' => 'Dayot, Marjorie B'],
            ['school_id' => '202200372', 'name' => 'Desoacido, Jessie F.'],
            ['school_id' => '202202303', 'name' => 'Estrada, Ralph Lawrenz C.'],
            ['school_id' => '202202310', 'name' => 'Labrador, Dona Fearl L.'],
            ['school_id' => '202202311', 'name' => 'Lachica, Geo Mar T.'],
            ['school_id' => '202202312', 'name' => 'Landazabal, Cristy Jane B.'],
            ['school_id' => '202202313', 'name' => 'Leñohan, Cheny Ann B.'],
            ['school_id' => '202200379', 'name' => 'Manangcay, Jerric M.'],
            ['school_id' => '202202321', 'name' => 'Ojales, Carlton James A.'],
            ['school_id' => '202202322', 'name' => 'Olasiman, Grant Adriane M.'],
            ['school_id' => '202200382', 'name' => 'Opo, Tyler Christian D.'],
            ['school_id' => '202202325', 'name' => 'Partosa, Ricky boy M.'],
            ['school_id' => '202120901', 'name' => 'Pinanonang, Neil G.'], // absent
            ['school_id' => '202202327', 'name' => 'Quibo, Jessa Mae A.'],
            ['school_id' => '202200383', 'name' => 'Ragay, Kenth S.'],
            ['school_id' => '202202337', 'name' => 'Silot, Chris Albert S.'],
            ['school_id' => '202202338', 'name' => 'Silva, John Leonil C.'], // absent
            ['school_id' => '202200388', 'name' => 'Tobasco, Jessa B.'],
            ['school_id' => '202120919', 'name' => 'Tomale, Florence T.'], // absent
            ['school_id' => '202202341', 'name' => 'Trumata, Princess Celine P.'],
            ['school_id' => '202202343', 'name' => 'Velonta, Azel Ryan A.'],
            ['school_id' => '202200389', 'name' => 'Vidal, Johnrel L.'],

        ];

        foreach ($data as $item) {
            SectionB::create($item);
        }
    }
}
