<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'body' => 'صوت صفير قلقل هيج الزلمي',
            "post_id" => '1',
            'user_id' => '2',
            'commentable_id' => '1',
            'commentable_type' => Post::class,
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
            
        ]);
        DB::table('comments')->insert([
            'body' => 'صوت صفير  هيج قلب الزلمي',
            "post_id" => '2',
            'user_id' => '1',
            'commentable_id' => '1',
            'commentable_type' => Post::class,
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
            
        ]);
        DB::table('comments')->insert([
            'body' => 'صوت  قلقل هيج قلب الزلمي',
            "post_id" => '3',
            'user_id' => '3',
            'commentable_id' => '1',
            'commentable_type' => Post::class,
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
            
        ]);
    }
}
