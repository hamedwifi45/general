<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'id' => '1' , 
            'title' => 'لماذا وهو هكذا',
            'user_id' => '1',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان طيبة خاطرك',
            'category_id' => '1',

        ]);
        DB::table('posts')->insert([
            'id' => '2' , 
            'title' => 'لماذا هكذا',
            'user_id' => '3',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان طيبة ',
            'category_id' => '3',
             
        ]);
        DB::table('posts')->insert([
            'id' => '3' , 
            'title' => 'لماذا وهو ',
            'user_id' => '2',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان خاطرك',
            'category_id' => '2',
             
        ]);
    }
}
