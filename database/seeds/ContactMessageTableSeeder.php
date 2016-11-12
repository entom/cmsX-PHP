<?php

use Illuminate\Database\Seeder;

/**
 * Class ContactMessageTableSeeder
 */
class ContactMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_messages')->delete();

        DB::table('contact_messages')->insert([
            'email' => 'email1@domain.com',
            'phone' => '321-123-123',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat',
            'readed' => 0
        ]);

        DB::table('contact_messages')->insert([
            'email' => 'email2@domain.com',
            'phone' => '999-000-999',
            'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat',
            'readed' => 0
        ]);
    }
}
