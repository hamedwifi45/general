<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alert1 = Alert::create([
            'user_id' => '1',
            'alert' => '23',
            
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
        ]);
        $alert2 = Alert::create([
            'user_id' => '2',
            'alert' => '2',
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
        ]);
        $alert3 = Alert::create([
            'user_id' => '3',
            'alert' => '3',
            
            'created_at' => Carbon::now()->subMonths(3)->subDays(5), // قبل 3 أشهر و 5 أيام
            'updated_at' => Carbon::now()->subMonths(3)->subDays(5),
        ]);
    }
}
