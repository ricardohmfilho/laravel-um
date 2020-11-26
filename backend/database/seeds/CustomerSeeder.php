<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\File;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('customers')->delete();
        $json = File::get("database/data/customer_data.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            Customer::create(array(
                'name'      => $obj->name,
                'email'     => $obj->email,
                'phone_number' => $obj->phone_number,
                'state_id'  => $obj->state_id,
                'city_id'   => $obj->city_id,
                'born_at'   => $obj->born_at,
                'is_active' => $obj->is_active
            ));
        }
    }
}
