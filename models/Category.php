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
    public static function getCategoryProducts($id, $page = 1)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select * from product where category_id = :id');
        $result -> execute([':id' => $id]);
        $categoryProducts = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $categoryProducts;
    }
    
    public static function getInfoProduct($id)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select * from product where id = :id');        
        $result -> execute([':id' => $id]);
        $infoProduct = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $infoProduct;
    }
    
    public static function quantityCategory($id)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select count(*) as count from product where category_id = :id');
        $result -> execute([':id' => $id]);
        $categoryQuantity = ($result -> fetch(PDO::FETCH_ASSOC))['count'];
        // Возвращает значение типа int
        return intval($categoryQuantity);        
    }
}