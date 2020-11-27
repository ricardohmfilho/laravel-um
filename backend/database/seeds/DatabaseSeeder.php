<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    protected $toTruncate = [ // Tabelas a serem truncadas
        'customer_plans',
        'customers',
        'cities',
        'states',
        'plans',
        'users',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); // Desabilita as restrições de 'mass assign'

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desabilita as chaves estrangeiras
        }

        foreach ($this->toTruncate as $table) { // Limpa as tabelas antes de uma nova inserção
            DB::table($table)->truncate();
        }

        $this->call([
            UserSeeder::class,
            PlanSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CustomerSeeder::class,
            CustomerPlanSeeder::class
        ]);

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Habilita as chaves estrangeiras
        }
        Model::reguard(); // Reabilita as restrições de 'mass assign'
    }
}
