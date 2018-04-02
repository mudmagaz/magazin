<?php

class CatalogController
{
    public function categoryAction($id)
    {
        $categoryList = Category::getCategory();
        $productsList = Category::getCategoryProducts($id);
        $template = Twig::ConnectTwig("index.html");
        echo $template->render(array('categoryList' => $categoryList, 'product' => $productsList));
        return true;
    }
}