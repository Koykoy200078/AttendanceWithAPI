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
    public function run()
    {
        $data = [
            ['school_id' => '202101696', 'name' => 'Almirante, Jann Louie Q.', 'date' => null],
            ['school_id' => '202203013', 'name' => 'Arceño, Jayson E.', 'date' => null],
            ['school_id' => '202102022', 'name' => 'Austero, Crank Neil R.', 'date' => null],
            ['school_id' => '202202286', 'name' => 'Bantillo, Phoebe Mariz Q.', 'date' => null],
            ['school_id' => '202120854', 'name' => 'Bondad, Don Marc P.', 'date' => null], // absent
            ['school_id' => '201905138', 'name' => 'Cafino, Randy S.', 'date' => null], // absent
            ['school_id' => '202202291', 'name' => 'Calpis, Lorenzo Jr. R.', 'date' => null],
            ['school_id' => '202102046', 'name' => 'Cantal, Jonathan Jr. U.', 'date' => null],
            ['school_id' => '202202292', 'name' => 'Cañete, John Adnhel E.', 'date' => null],
            ['school_id' => '202200368', 'name' => 'Ceriales, Aiko V.', 'date' => null],
            ['school_id' => '202202298', 'name' => 'Deatras, Keizharra B.', 'date' => null],
            ['school_id' => '202202299', 'name' => 'Delara, Kriste Jo P.', 'date' => null],
            ['school_id' => '202202300', 'name' => 'Dorio, Francis Clinton G.', 'date' => null],
            ['school_id' => '202202301', 'name' => 'Elmaco, John Howard B.', 'date' => null],
            ['school_id' => '202000117', 'name' => 'Eluna, Lee Cliford P.', 'date' => null],
            ['school_id' => '202001497', 'name' => 'Ention, Wingel Antonnette T.', 'date' => null], // absent
            ['school_id' => '202120872', 'name' => 'Epan, Christian Ray B.', 'date' => null], // absent
            ['school_id' => '202120874', 'name' => 'Estrellado, Jay Z.', 'date' => null], // absent
            ['school_id' => '2021214678', 'name' => 'Galleon, Oliver P.', 'date' => null],
            ['school_id' => '202120882', 'name' => 'Jumawan, Lysa Mae A.', 'date' => null],
            ['school_id' => '202120887', 'name' => 'Magsayo, Mary Paola', 'date' => null],
            ['school_id' => '202121001', 'name' => 'Manso, Ronin Allyson Y.', 'date' => null],
            ['school_id' => '202202317', 'name' => 'Mariano, Des Jozef M.', 'date' => null],
            ['school_id' => '202202326', 'name' => 'Pasague, Ma. Cristina M.', 'date' => null],
            ['school_id' => '202101655', 'name' => 'Paster, Jerico P.', 'date' => null],
            ['school_id' => '202202329', 'name' => 'Radoc, Cyrell Jane E.', 'date' => null],
            ['school_id' => '202200385', 'name' => 'Rusiana, Shane Mark', 'date' => null],
            ['school_id' => '202202332', 'name' => 'Sabejon, Matt Ian V.', 'date' => null],
            ['school_id' => '202202334', 'name' => 'Santillan, Lorie Ann Mae T.', 'date' => null],
            ['school_id' => '202120923', 'name' => 'Tubongbanua, Reden D.', 'date' => null], // absent
        ];

        foreach ($data as $item) {
            SectionA::create($item);
        }
    }
}
