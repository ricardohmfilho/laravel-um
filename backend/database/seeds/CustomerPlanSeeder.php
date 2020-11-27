<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_plans')->insert([
            ['customer_id' => 1, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 1, 'plan_id' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 2, 'plan_id' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 3, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 5, 'plan_id' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 5, 'plan_id' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 6, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 9, 'plan_id' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 9, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 9, 'plan_id' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 10, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 11, 'plan_id' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 12, 'plan_id' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 13, 'plan_id' => 2, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 14, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 16, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 16, 'plan_id' => 3, 'created_at' => date("Y-m-d H:i:s")],
            ['customer_id' => 17, 'plan_id' => 1, 'created_at' => date("Y-m-d H:i:s")]
        ]);
    }
}
