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
}

