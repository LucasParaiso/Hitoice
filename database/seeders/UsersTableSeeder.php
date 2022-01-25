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
                'name' => 'admin',
                'password' => '$2y$10$22f6rGwl0pb1NvUjNrW5b.NadqGfe0eBedbUUEbnlQPzjDJ8vqdJW',
                'role_as' => 'admin'
            ]
        ]);
    }
}
