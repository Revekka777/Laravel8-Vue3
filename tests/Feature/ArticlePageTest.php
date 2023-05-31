<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticlePageTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $tags = Tag::factory(3)->create();

        $articles = Article::factory(2)->create();

        $tags_id = $tags->pluck('id');

        $articles->each(function($articles) use($tags_id){
            $articles->tags()->attach($tags_id->random(3));
            State::factory(1)->create([
                'article_id'=> $articles->id
            ]);
        });
    }

    public function testGetArticleIndex() : void
    {
        $response = $this->get(route('article.index'));
        $response->assertStatus(200);
    }

    public function testGetArticleShow() :void
    {
        $article = Article::first();
        $response = $this->get(route('article.show', $article->slug));
        $response->assertStatus(200);
    }

    public function testGetAllArticlesByTag(): void
    {
        $tag = Tag::first()->id;
        $response = $this->get(route('article.tag', $tag));
        $response->assertStatus(200);
    }
}
