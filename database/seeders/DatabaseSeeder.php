<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Items;
use App\Models\Category;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Jahidin',
            'email' => 'Jahidin@gmail.com',
            'password' => bcrypt('12345')
        ]);
        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan'
        ]);
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);
        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik'
        ]);

        Unit::create([
            'name' => 'Unit',
            'slug' => 'unit'
        ]);
        Unit::create([
            'name' => 'Kilogram',
            'slug' => 'kilogram'
        ]);
        Unit::create([
            'name' => 'Liter',
            'slug' => 'liter'
        ]);

        Items::factory(20)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
