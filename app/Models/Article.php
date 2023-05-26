<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';

    public $dates = ['published_at'];

    protected $fillable = ['title', 'body', 'img', 'slug'];

//    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function state(){
        return $this->hasOne(State::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview(){
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans(){
        return $this->published_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers){
        return $query->with('tags', 'state')->orderBy('created_at','desc')->limit($numbers)->get();
    }
}
