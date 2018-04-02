<?php

class CatalogController
{
    public function categoryAction($id, $page = 1)
    {
//         var_dump($id);
//         var_dump($page);
//         var_dump($from);
//         var_dump($items);
        $categoryList = Category::getCategory();
        $categoryQuantity = Category::quantityCategory($id);
        $pageDataQuery = Pagination::pageDivider($categoryQuantity);
        //var_dump($pageDataQuery);
        $pages = $pageDataQuery;
        var_dump($pages);
        extract($pageDataQuery[$page]);
//         var_dump($id);
//         var_dump($page);
//         var_dump($from);
//         var_dump($items);        
        $productsList = Category::getCategoryProducts($id, $page, $from, $items);        
        $template = Twig::connectTwig("index.html");
        echo $template->render(array('categoryList' => $categoryList, 'product' => $productsList, 'pages' => $pages));
        return true;
    }
}