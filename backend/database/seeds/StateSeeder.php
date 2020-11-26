<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            array(
                'id' => 1,
                'name' => 'Minas Gerais',
                'uf' => 'MG',
                'ibge_code' => 31,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 2,
                'name' => 'São Paulo',
                'uf' => 'SP',
                'ibge_code' => 35,
                'created_at' => date("Y-m-d H:i:s")
            ),
        ]);
    }
}
