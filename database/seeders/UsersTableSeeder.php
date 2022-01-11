<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'lucas',
                'password' => '$2y$10$kc1Y6AGHsnYh72pAIjGONOpSXEHjCjMt1y1CuQ6/gGeBsGBO5sNzG'
            ],
            [
                'name' => 'paraiso',
                'password' => '$2y$10$qAUdWAynFGtpGDsTyZkm2.dPR7KB1l24DYh2G.JYX2nX3t/WqTyK6'
            ]
        ]);
    }
}
