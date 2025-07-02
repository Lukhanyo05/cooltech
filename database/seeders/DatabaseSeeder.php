<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users (optional)
        // User::factory(10)->create();

        // Create a specific test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 10 categories
        Category::factory(10)->create();

        // Create 10 tags
        Tag::factory(10)->create();

        // Create 20 articles
        Article::factory(20)->create();
    }
}