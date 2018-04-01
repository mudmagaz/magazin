<?php

class CategoryController
{
    public function categoryProductsAction()
    {
        $categoryList = Category::getCategory();
        $categoryProducts = Category::getCategoryProducts($id);       
        require_once(ROOT . '/vendor/autoload.php');
        $loader = new Twig_Loader_Filesystem(ROOT . '/templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('index.html');
        echo $template->render(array('categoryList' => $categoryList, 'product' => $categoryProducts));
        return true;
    }
}