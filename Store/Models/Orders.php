<?php
class Order
{
    //GET
    public function getOrders()
    {
        //returns all results from the orders table
        $db = Database::getDB();
        $sql = "SELECT * FROM orders";
        $result = $db->query($sql);

        $orders_tolist = $result->fetchAll();
        return $orders_tolist;
    }

    //GET
    public function getOrder($x)
    {
        //returns a single result from the orders table based on id
        $db = Database::getDB();
        $sql = "SELECT * FROM orders WHERE id = '$x'";
        $result = $db->query($sql);

        $orders_tosing = $result->fetch();
        return $orders_tosing;
    }
}