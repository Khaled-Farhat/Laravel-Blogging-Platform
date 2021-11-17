<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Category::factory(5)->create();
        //Tag::factory(3)->create();
        //User::factory(2)->hasArticles(2)->create();
        Article::factory()->create();
    }
}
