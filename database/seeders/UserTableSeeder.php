<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_item = new User();
        $new_item->name = 'admin';
        $new_item->email = 'admin@admin.it';
        $new_item->password = Hash::make('12345678');
        $new_item->save();
    }
}
