<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$d =[];

        for($i=0;$i<100;$i++){
        	$data = [];
        	$data['username'] = str_random(12);
        	$data['password'] = str_random(20);
        	$data['tel'] = str_random(11);
        	$data['file'] = '/uploads/2017-12-01/img_5a2108995f122.jpeg';

        	$d[] = $data;
        }

        DB::table('users')->insert($d);

    }
}
