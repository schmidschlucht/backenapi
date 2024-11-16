<?php

class ArticleController {

    private Article $article;

    public function __construct() {
        $this->article = new Article();

    }
}