<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Product::factory(50)->create();

        User::factory()->create([
            'name' => 'Grey',
            'email' => 'grey2525@gmail.com',
            'password' => 'grey2525',
            'is_admin' => true,
        ]);
    }
}
