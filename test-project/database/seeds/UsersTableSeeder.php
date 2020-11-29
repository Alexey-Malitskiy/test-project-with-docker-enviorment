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
            [
                'name' => 'Alexey',
                'profession' => 'developer',
            ],
            [
                'name' => 'Georgiy',
                'profession' => 'designer',
            ],
            [
                'name' => 'Sergey',
                'profession' => 'tester',
            ],
            [
                'name' => 'Michel',
                'profession' => 'manager',
            ],
        ]);
    }
}
