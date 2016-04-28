<?php
class Product
{
    //GET
    public function getProducts()
    {
        //Returns all results from the products table
        $db = Database::getDB();
        $sql = "SELECT * FROM products";
        $result = $db->query($sql);

        $products_tolist = $result->fetchAll();
        return $products_tolist;
    }
    
    
    //GET
    public function getProduct($x)
    {
        //Returns one product from the products table
        $db = Database::getDB();
        $sql = "SELECT * FROM products WHERE id = '$x'";
        $result = $db->query($sql);

        $product_tosing = $result->fetch();
        return $product_tosing;
    }

    //POST
    public function addProduct($name, $price, $qty, $ser, $desc, $cate)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO `airlinephp`.`products` (`id`, `name`, `price`, `stock`, `serial_num`, `description`, `category`) 
                VALUES (NULL, '$name', '$price', '$qty', '$ser', '$desc', '$cate')";
        $result = $db->exec($sql);
        
        return $result;
    }

    //GET
    public function getProdByCat($x)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM products
                WHERE category = '$x'";
        $result = $db->query($sql);

        $prods_by_cat = $result->fetchAll();
        return $prods_by_cat;
    }

    //GET
    public function getProdBySer($serial_number)
    {
        $db = Database::getDB();
        $sql = "SELECT COUNT(*) FROM products WHERE serial_num = '$serial_number'";
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetchAll();

        return $count;
    }

    //POST
    public function updateProd($id, $name, $price, $stock, $serial_num, $description, $category)
    {
        $db = Database::getDB();
        $sql = "UPDATE products
                SET name = '$name', price = '$price', stock = '$stock', serial_num = '$serial_num', description = '$description', category = '$category'
                WHERE id = '$id'";
        $row_count = $db->exec($sql);
        
        return $row_count;
    }
    
    //POST
    public function deleteProd($id)
    {
        $db = Database::getDB();
        $sql = "DELETE FROM products WHERE id = '$id'";
        $row_count = $db->exec($sql);
        
        return $row_count;
    }

}