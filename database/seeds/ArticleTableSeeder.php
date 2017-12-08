<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$data =[];

        for($i=0;$i<50;$i++) {
        	$d = [];
        	
        	$d['title'] = str_random(10);
        	$d['content'] = str_random(100);
        	$d['img'] = $faker->imageUrl(200,100);
            
            $data[] = $d;
        }

        DB::table('articles')->insert($data);

    }
}
