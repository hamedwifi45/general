<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisstionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisstions')->insert([
            'name' => 'add-post',
            'desc' => "اضف منشورا"
        ]);
        DB::table('permisstions')->insert([
            'name' => 'edit-post',
            'desc' => "تعديل منشورا"
        ]);
        DB::table('permisstions')->insert([
            'name' => 'delete-post',
            'desc' => "حذف منشورا"
        ]);
    }
}
