<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(15)->create();
        $categories = Category::factory(5)->create();
        User::factory(5)->hasArticles(10)->create();

        Article::all()->each(function($article) use($tags, $categories) {
            $article->category()->associate($categories->random());
            $article->save();

            $article->tags()->attach($tags->random(rand(0, 5))->pluck('id'));

            $commentsCount = rand(0, 15);

            for ($i = 0; $i < $commentsCount; ++$i) {
                $article->comments()->save(Comment::factory()->make());
            }
        });
    }
}
