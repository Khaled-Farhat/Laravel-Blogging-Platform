<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@blog.test',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Tag::factory(15)->create();
        User::factory(3)->hasArticles(2)->create();

        $tags = Tag::all();
        Article::all()->each(function($article) use($tags) {
            $article->tags()->attach($tags->random(rand(1, 5))->pluck('id'));
            $article->comments()->save(Comment::factory()->make());
        });
    }
}
