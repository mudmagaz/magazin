<?php

class Pagination
{
    const ITEM_PER_PAGE = 3;
    
    public static function pageDivider($categoryQuantity)
    {
        $prodPerPage = self::ITEM_PER_PAGE;
        $pages = ceil($categoryQuantity / $prodPerPage);
        $pageDataQuery = [];
        for ($i = 1, $from = 0; $i <= $pages; $i++, $from += $prodPerPage){
            $pageDataQuery[$i][] = $i;
            $pageDataQuery[$i][] = $from;
            $pageDataQuery[$i][] = $prodPerPage;
        }
        return $pageDataQuery;
    }
}