<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            array(
                'id' => 1,
                'name' => 'Free',
                'value' => 0.00,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 2,
                'name' => 'Basic',
                'value' => 100.00,
                'created_at' => date("Y-m-d H:i:s")
            ),
            array(
                'id' => 3,
                'name' => 'Plus',
                'value' => 187.00,
                'created_at' => date("Y-m-d H:i:s")
            ),
        ]);
    }
}