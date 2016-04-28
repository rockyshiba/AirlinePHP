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

    //POST
    public function updateOrder($id, $c_id, $subtotal, $total, $shipping, $items, $shipped, $shipped, $order_date)
    {
        $db = Database::getDB();
        $sql = "UPDATE orders SET c_id = '$c_id', subtotal = '$subtotal',
                total = '$total', shipping = '$shipping', items = '$items', shipped = '$shipped',
                 order_date = '$order_date'
                 WHERE id = '$id'";

        $row_count = $db->exec($sql);
        return $row_count;
    }

    //POST
    public function deleteOrder($id)
    {
        $db = Database::getDB();
        $sql = "DELETE FROM order WHERE id = '$id'";
        $row_count = $db->exec($sql);

        return $row_count;
    }
}