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
    public static function getInfoProduct($id)
    {
        $db = Db::getConnect();
        $result = $db -> prepare('Select * from product where id = :id');
        $result -> execute([':id' => $id]);
        $infoProduct = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $infoProduct;
    }
    public static function getInfoProductByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnect();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);
        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        var_dump($products);
        return $products;
    }

}