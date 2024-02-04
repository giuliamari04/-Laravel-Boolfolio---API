<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/technologies.json');
        $technologies = json_decode($json, true);
        //$technologies = ['html','css', 'javascript plain', 'php plain', 'laravel', 'vite js'];
        foreach($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->image = $technology['url_logo'];
            $newTechnology->slug = Str::slug($technology['name'],'-');
            $newTechnology->save();

        }

    }
}
