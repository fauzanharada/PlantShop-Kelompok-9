<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ojan = User::create([
            'name' => 'admin',
            'email' => 'ojan@admin.com',
            'password' => bcrypt('Admin123'),
        ]);
        $ojan->assignRole('admin');

        $amin = User::create([
            'name' => 'amin',
            'email' => 'amin@admin.com',
            'password' => bcrypt('Admin123'),
        ]);
        $amin->assignRole('admin');

        $mihun = User::create([
            'name' => 'mihun',
            'email' => 'mihun@admin.com',
            'password' => bcrypt('Admin123'),
        ]);
        $mihun->assignRole('admin');
    }
}
