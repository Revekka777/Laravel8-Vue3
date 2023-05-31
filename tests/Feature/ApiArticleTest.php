<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiArticleTest extends TestCase
{
    protected $slug;

    protected function setUp(): void
    {
        parent::setUp();

        $articles = Article::factory(2)->create();

        $articles->each(function($articles) {
            State::factory(1)->create([
                'article_id'=> $articles->id
            ]);
        });

        $this->slug = Article::first()->slug;
    }

    public function testApiGetArticleJson() : void
    {

        $response = $this->get(route('api.article.show', ['slug' => $this->slug]));
        $response->assertStatus(200);
    }

    public function testApiPutArticleViewsInc():void
    {
        $response = $this->put(route('api.article.views.inc',  ['slug'=>$this->slug]));
        $response->assertStatus(200);
    }

    public function testApiPutArticleLikesInc():void
    {
        $response = $this->put(route('api.article.likes.inc',  ['slug'=>$this->slug]));
        $response->assertStatus(200);
    }


}
