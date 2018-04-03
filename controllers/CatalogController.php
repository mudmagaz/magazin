<?php

class CatalogController
{
    public function categoryAction($id, $page = 1)
    {
        $categoryList = Category::getCategory();
        $categoryQuantity = Category::quantityCategory($id);
        $pageDataQuery = Pagination::pageDivider($categoryQuantity);       
        $pages = $pageDataQuery;        
        extract($pageDataQuery[$page]);     
        $productsList = Category::getCategoryProducts($id, $page, $from, $items);        
        $template = Twig::connectTwig("index.html");
        echo $template->render(array('categoryList' => $categoryList, 'product' => $productsList, 'pages' => $pages));
        return true;
    }
}