<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
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
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'moderator',
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@blog.test',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ]);

        $tags = Tag::factory(15)->create();
        $categories = Category::factory(5)->create();
        User::factory(3)->hasArticles(2)->create();

        Article::all()->each(function($article) use($tags, $categories) {
            $article->category()->associate($categories->random());
            $article->save();

            $article->tags()->attach($tags->random(rand(1, 5))->pluck('id'));
            $article->comments()->save(Comment::factory()->make());
        });
    }
}
