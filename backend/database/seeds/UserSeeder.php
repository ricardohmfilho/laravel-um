<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Friedrich W. Nietzsche',
            'email' => 'ecce_homo@email.com',
            'is_active' => 1,
            'password' => '$2y$10$1Eo91um9gkB0zLo8b2QntOslSDAOjiExztOmIaM7I4M6ttH6NtTvy', // 123456
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        factory(User::class, 10)->create();
    }
}
