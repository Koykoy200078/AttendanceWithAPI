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
            ['school_id' => '202101696', 'name' => 'Almirante, Jann Louie Q.'],
            ['school_id' => '202203013', 'name' => 'Arceño, Jayson E.'],
            ['school_id' => '202102022', 'name' => 'Austero, Crank Neil R.'],
            ['school_id' => '202202286', 'name' => 'Bantillo, Phoebe Mariz Q.'],
            ['school_id' => '202120854', 'name' => 'Bondad, Don Marc P.'], // absent
            ['school_id' => '201905138', 'name' => 'Cafino, Randy S.'], // absent
            ['school_id' => '202202291', 'name' => 'Calpis, Lorenzo Jr. R.'],
            ['school_id' => '202102046', 'name' => 'Cantal, Jonathan Jr. U.'],
            ['school_id' => '202202292', 'name' => 'Cañete, John Adnhel E.'],
            ['school_id' => '202200368', 'name' => 'Ceriales, Aiko V.'],
            ['school_id' => '202202298', 'name' => 'Deatras, Keizharra B.'],
            ['school_id' => '202202299', 'name' => 'Delara, Kriste Jo P.'],
            ['school_id' => '202202300', 'name' => 'Dorio, Francis Clinton G.'],
            ['school_id' => '202202301', 'name' => 'Elmaco, John Howard B.'],
            ['school_id' => '202000117', 'name' => 'Eluna, Lee Cliford P.'],
            ['school_id' => '202001497', 'name' => 'Ention, Wingel Antonnette T.'], // absent
            ['school_id' => '202120872', 'name' => 'Epan, Christian Ray B.'], // absent
            ['school_id' => '202120874', 'name' => 'Estrellado, Jay Z.'], // absent
            ['school_id' => '2021214678', 'name' => 'Galleon, Oliver P.'],
            ['school_id' => '202120882', 'name' => 'Jumawan, Lysa Mae A.'],
            ['school_id' => '202120887', 'name' => 'Magsayo, Mary Paola'],
            ['school_id' => '202121001', 'name' => 'Manso, Ronin Allyson Y.'],
            ['school_id' => '202202317', 'name' => 'Mariano, Des Jozef M.'],
            ['school_id' => '202202326', 'name' => 'Pasague, Ma. Cristina M.'],
            ['school_id' => '202101655', 'name' => 'Paster, Jerico P.'],
            ['school_id' => '202202329', 'name' => 'Radoc, Cyrell Jane E.'],
            ['school_id' => '202200385', 'name' => 'Rusiana, Shane Mark'],
            ['school_id' => '202202332', 'name' => 'Sabejon, Matt Ian V.'],
            ['school_id' => '202202334', 'name' => 'Santillan, Lorie Ann Mae T.'],
            ['school_id' => '202120923', 'name' => 'Tubongbanua, Reden D.'], // absent
        ];

        foreach ($data as $item) {
            SectionA::create($item);
        }
    }
}
