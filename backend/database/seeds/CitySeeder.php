<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            array(
                'id' => 1,
                'name' => 'Areado',
                'ibge_code' => 3104304,
                'state_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 2,
                'name' => 'Belo Horizonte',
                'ibge_code' => 3106200,
                'state_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 3,
                'name' => 'Itapeva',
                'ibge_code' => 3133600,
                'state_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 4,
                'name' => 'Araraquara',
                'ibge_code' => 3503208,
                'state_id' => 2,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 5,
                'name' => 'Limeira',
                'ibge_code' => 3526902,
                'state_id' => 2,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 6,
                'name' => 'Rio Claro',
                'ibge_code' => 3543907,
                'state_id' => 2,
                'created_at' => date("Y-m-d H:i:s")
            ),
        ]);
    }
}
