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

        $products = $result->fetchAll();
        return $products;
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

}