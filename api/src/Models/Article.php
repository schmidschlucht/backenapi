<?php

use Core\Model;

class Article extends Model {

    public function __construct() {
        $this->table = 'articles';
    }
}