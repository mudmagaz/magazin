<?php

class Pagination
{
    const ITEM_PER_PAGE = 3;
    
    public static function pageDivider($categoryQuantity)
    {        
        $prodPerPage = self::ITEM_PER_PAGE;
        $pages = ceil($categoryQuantity['quantity'] / $prodPerPage);
        $pageDataQuery = [];
        for ($i = 1, $from = 0; $i <= $pages; $i++, $from += $prodPerPage){            
            $pageDataQuery[$i]['page'] = $i;
            $pageDataQuery[$i]['from'] = $from;
            $pageDataQuery[$i]['items'] = $prodPerPage;
            $pageDataQuery[$i]['id_category'] = $categoryQuantity['id_category'];            
        }
        //var_dump($pageDataQuery);
        return $pageDataQuery;
    }
}