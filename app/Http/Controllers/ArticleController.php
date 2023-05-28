<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::allPaginate(10);
        return view('app.article.index')->with(['articles'=>$articles]);
    }

    public function show($slug){
        $article = Article::findBySlug($slug);
        return view('app.article.show')->with(['article' => $article]);
    }

    public function allByTag(Tag $tag){
        $articles = $tag->articles()->findByTag();
        return view('app.article.byTag')->with(['articles' => $articles]);
    }
}
