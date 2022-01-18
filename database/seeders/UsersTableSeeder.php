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
            ],
            [
                'name' => 'marcela',
                'password' => '$2y$10$laJbhRFLubybc/pSjxdU8Ooznmf7qGXed2KT5.vGyF3tBqB/pWHK.',
                'role_as' => 'user'
            ],
            [
                'name' => 'pedro',
                'password' => '$2y$10$JmBsOmWaBDM2jOg76ZCIIeEwdc1eRilYizp8n.Shw8TbG54BhZGry',
                'role_as' => 'user'
            ]
        ]);
    }
}
