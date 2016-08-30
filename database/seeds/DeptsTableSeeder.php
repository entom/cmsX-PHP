<?php

use Illuminate\Database\Seeder;

class DeptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depts')->insert([
            'name' => 'Office'
        ]);

        DB::table('depts')->insert([
            'name' => 'Programmers'
        ]);
    }
}
