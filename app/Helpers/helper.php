<?php

if( ! function_exists('activeMainLink')){
    function activeMainLink(){
        if(request()->is('main')){
            return 'menu-link__active';
        }
        return '';
    }
}
if( ! function_exists('activeArticleLink')){
    function activeArticleLink(){
        if(request()->is('articles') || request()->is('articles/*')){
            return 'menu-link__active';
        }
        return '';
    }
}