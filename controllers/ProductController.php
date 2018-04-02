<?php

class ProductController
{
    public function categoryAction($id)
    {
        $categoryList = Category::getCategory();
        $infoProduct = Category::getInfoProduct($id);
        $template = Twig::connectTwig('product.html');
        echo $template->render(array( 'product' => $infoProduct, 'categoryList' => $categoryList));
        return true;
    }
}