<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RulesSeeder::class,
            UsersSeeder::class,
            CategoriesSeeder::class,
            PostSeeder::class,
            PermisstionSeeder::class,
            CommentsSeeder::class,
            NotificationSeeder::class,
            AlertSeeder::class
        ]);
    }
}
