<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Rhu',
            'email' => 'rhuaridh.clark@qanw.co.uk',
            'password' => Hash::make('I%7zYj0M9KIg1'),
            'type' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'test.user@qanw.co.uk',
            'password' => Hash::make('I%7zYj0M9KIg2'),
            'type' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Graeme',
            'email' => 'graeme.mcpike@qanw.co.uk',
            'password' => Hash::make('I%7zYj0M9KIg3'),
            'type' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Daniel',
            'email' => 'daniel.oraca@qanw.co.uk',
            'password' => Hash::make('I%7zYj0M9KIg4'),
            'type' => 'admin',
        ]);
    }
}
