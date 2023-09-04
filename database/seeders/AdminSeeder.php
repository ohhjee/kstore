<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\admins;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admins::create([
            'name'=>'Tim Cooker',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('secret'),
            'role'=>'1'
        ]);
    }
}
