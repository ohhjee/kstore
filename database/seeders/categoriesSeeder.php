<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::create(['name' => 'phone & tablets']);
        $category2 = Category::create(['name' => "men's fashions"]);

        $category1->brand()->create(['brand' => 'Iphone']);
        $category1->brand()->create(['brand' => 'Samsung']);
        $category1->brand()->create(['brand' => 'Xaiomi']);
        $category2->brand()->create(['brand' => 'dior']);
    }
}
