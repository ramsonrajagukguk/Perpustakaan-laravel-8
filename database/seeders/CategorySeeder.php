<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Category::create([
            'name' => 'VB Net',
            'slug' => 'vb-net',
        ]);
        Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Category::create([
            'name' => 'Codeigneter',
            'slug' => 'codeigneter',
        ]);

    }
}
