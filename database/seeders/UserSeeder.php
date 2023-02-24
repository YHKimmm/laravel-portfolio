<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Brayden',
            'email' => 'braydenkim@gmail.com',
            'password' => 'kfbk1318',
        ]);
        User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => 'john1234',
        ]);
        User::create([
            'name' => 'Jane',
            'email' => 'jane@gmail.com',
            'password' => 'jane1234',
        ]);
        User::create([
            'name' => 'Jack',
            'email' => 'jack@gmail.com',
            'password' => 'jack1234',
        ]);
    }
}
