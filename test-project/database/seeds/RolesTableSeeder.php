<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'skill' => 'write code',
            ],
            [
                'skill' => 'test the code',
            ],
            [
                'skill' => 'communicate with the manager',
            ],
            [
                'skill' => 'draw',
            ],
            [
                'skill' => 'set tasks',
            ],
        ]);
    }
}
