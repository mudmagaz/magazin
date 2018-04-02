<?php

class SiteController
{
    public function indexAction() 
    {        
        $categoryList = Category::getCategory();       
        $productsList = Product::getLatestProducts();
        $template = Twig::connectTwig('index.html');
        echo $template->render(array('categoryList' => $categoryList, 'product' => $productsList));
        return true;        
    }    
}
