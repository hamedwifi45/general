<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '1',
            "name" => 'محمد النهونجي',
            'email' => 'بطاطا التاسع@بطاطا.com',
            'password' => Hash::make('8888888888'),
            'role_id' => '1',
            'profile_photo_path' => '/profile-photos/17oQHLV8ueDjcNRy1m3AWv1qFu7kIc0NWR5zBPBA.png'
            
        ]);
        DB::table('users')->insert([
            'id' => '2',
            "name" => ' النهونجي',
            'email' => ' التاسع@بطاطا.com',
            'password' => Hash::make('99999999'),
            'role_id' => '1',
            'profile_photo_path' => '/profile-photos/17oQHLV8ueDjcNRy1m3AWv1qFu7kIc0NWR5zBPBA.png'
            
        ]);
        DB::table('users')->insert([
            'id' => '3',
            "name" => 'محمد ',
            'email' => 'بطاطا @بطاطا.com',
            'password' => Hash::make('77777777'),
            'role_id' => '1',
            'profile_photo_path' => '/profile-photos/17oQHLV8ueDjcNRy1m3AWv1qFu7kIc0NWR5zBPBA.png'
            
        ]);
        DB::table('users')->insert([
            'id' => '4',
            "name" => 'محمد 3434',
            'email' => 'بطاطا التاسع@.com',
            'password' => Hash::make('8888888888'),
            'role_id' => '1',
            'profile_photo_path' => '/profile-photos/17oQHLV8ueDjcNRy1m3AWv1qFu7kIc0NWR5zBPBA.png'
            
        ]);
    }
}
