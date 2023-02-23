<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'React',
            'slug' => 'react',
        ]);
        Tag::create([
            'name' => 'Node.js',
            'slug' => 'node.js',
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
    }
}
