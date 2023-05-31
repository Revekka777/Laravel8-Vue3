<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiCommentTest extends TestCase
{
    public function testApiPostCommentAdd(): void
    {
        $response = $this->post(route('api.article.add.comment', [
            'subject' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(3,false),
            'article_id' => Article::factory()->create()->id
        ]));
        $response->assertStatus(200);
    }
}
