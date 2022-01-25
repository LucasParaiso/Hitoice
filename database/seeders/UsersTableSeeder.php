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
                'name' => 'mestre',
                'password' => '$2y$10$zLuE/w.oh4fVaGzMGFUdaOMUaShqciKCB0wkru4Sr0ZT8uSF6b9NO',
                'role_as' => 'admin'
            ]
        ]);
    }
}
