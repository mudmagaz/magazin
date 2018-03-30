<?php

class SiteController
{
    public function indexAction() {
        $categories = Category::getCategory();
        require_once(ROOT . '/templates/index.html');
        return true;
        var_dump($categoryList);
    }
}