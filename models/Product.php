<?php
class Product
{

    public static function getLatestProducts()
    {
        // Соединение с БД
        $db = Db::getConnect();
        // Текст запроса к БД
        $sql = 'SELECT id, name, price, is_new FROM product ';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;

    }
    public static function getProducts($id)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select * from product where id = :id');
        //$id = intval($id);
        $result -> execute([':id' => $id]);
        $infoProduct = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $infoProduct;
    }

}