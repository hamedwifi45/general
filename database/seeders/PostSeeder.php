<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'id' => '1', 
            'title' => 'لماذا وهو هكذا',
            'user_id' => '1',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان طيبة خاطرك',
            'category_id' => '1',
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
        ]);
        
        DB::table('posts')->insert([
            'id' => '2', 
            'title' => 'لماذا هكذا',
            'user_id' => '3',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان طيبة ',
            'category_id' => '3',
            'created_at' => Carbon::now()->subWeeks(2)->subHours(3), // قبل أسبوعين و 3 ساعات
            'updated_at' => Carbon::now()->subWeeks(2)->subHours(3),
        ]);
        
        DB::table('posts')->insert([
            'id' => '3', 
            'title' => 'لماذا وهو ',
            'user_id' => '2',
            'slug' => Random::generate(),
            'body' => 'هو في عنا بطاطا محمرة ليش عشان خاطرك',
            'category_id' => '2',
            'created_at' => Carbon::now()->subDays(10)->subMinutes(45), // قبل 10 أيام و 45 دقيقة
            'updated_at' => Carbon::now()->subDays(10)->subMinutes(45),
        ]);
        
        // إضافة المزيد من المنشورات بأوقات مختلفة
        DB::table('posts')->insert([
            'id' => '4', 
            'title' => 'مقال جديد',
            'user_id' => '1',
            'slug' => Random::generate(),
            'body' => 'هذا مقال جديد تم إنشاؤه مؤخراً',
            'category_id' => '1',
            'created_at' => Carbon::now()->subHours(6), // قبل 6 ساعات
            'updated_at' => Carbon::now()->subHours(6),
        ]);
        
        DB::table('posts')->insert([
            'id' => '5', 
            'title' => 'مقال قديم جداً',
            'user_id' => '2',
            'slug' => Random::generate(),
            'body' => 'هذا مقال قديم جداً',
            'category_id' => '2',
            'created_at' => Carbon::now()->subYear()->subMonths(2), // قبل سنة وشهرين
            'updated_at' => Carbon::now()->subYear()->subMonths(2),
        ]);
    }
}