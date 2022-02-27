<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cover ="buku/buku.jpg";
        return [
            'author_id' => Author::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'judul' => $this->faker->sentence(mt_rand(3,5)),
            'keterangan' => $this->faker->sentence(50),
            'jumlah' => rand(10,20),
            'cover' => $cover,
        ];
    }
}
