<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['frontend', 'backend', 'fullstack'];
        foreach ($categories as $value) {
            $newCategory = new Category();
            $newCategory->name = $value;
            $newCategory->slug = Str::slug($value, '-');
            $newCategory->save();
        }
    }
}
