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
    public function addProducts()
    {
        return true;
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

}