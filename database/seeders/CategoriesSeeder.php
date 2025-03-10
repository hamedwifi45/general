<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'title' => 'سياسة',
            'slug' => Random::generate()
        ]);
        DB::table('categories')->insert([
            'title' => 'اقتصاد',
            'slug' => Random::generate()
        ]);
        DB::table('categories')->insert([
            'title' => 'جماعي',
            'slug' => Random::generate()
        ]);
    }
}
