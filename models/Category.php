<?php

class Category 
{
    public static function getCategory()
    {
       $db = Db::getConnect();       
       $result = $db->query('Select * from category');
       
       $i = 0;
       $categoryList = [];
       while ($row = $result->fetch()) 
       {
           $categoryList[$i]['id'] = $row['id'];
           $categoryList[$i]['name'] = $row['name'];
           $i++;
       }       
       return $categoryList;
    }
}