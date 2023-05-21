<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(10)->create();

        $articles = Article::factory(20)->create();

        $tags_id = $tags->pluck('id');

        $articles->each(function($articles) use($tags_id){
            $articles->tags()->attach($tags_id->random(3));
            Comment::factory(3)->create([
                'article_id' =>$articles->id
            ]);
            State::factory(1)->create([
                'article_id'=> $articles->id
            ]);
        });
    }
}
