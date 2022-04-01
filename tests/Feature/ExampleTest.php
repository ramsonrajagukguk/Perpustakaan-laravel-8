<?php

namespace Tests\Feature;

use Database\Seeders\BookSSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_basic_example()
    {
        $this->seed();

        $this->seed(BookSSeeder::class);
    }
}