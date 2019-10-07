<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                [
                    'name' => 'Shrenik Shah',
                    'email' => 'shrenik@c-h.tech',
                    'password' => bcrypt('this.admin'),
                    'phone'=>'9722130402',
                    'designation'=>'IT',
                    'status'=>1,
                    'user_type'=>1
                ],
                [
                    'name' => 'Krunal',
                    'email' => 'kunal@qtechnetworks.com',
                    'password' => bcrypt('Hello124'),
                    'phone'=>'123456789',
                    'designation'=>'IT',
                    'status'=>1,
                    'user_type'=>1
                ]
            ]
        );
    }
}
