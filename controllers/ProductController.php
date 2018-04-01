<?php

class ProductController
{
    public function categoryAction($id)
    {

        $infoProduct = Category::getInfoProduct($id);
        require_once(ROOT . '/vendor/autoload.php');
        $loader = new Twig_Loader_Filesystem(ROOT . '/templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('product.html');
        echo $template->render(array( 'product' => $infoProduct));
        return true;
    }
}