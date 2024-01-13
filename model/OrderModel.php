<?php
class OrderModel
{
    public static function fromResult(array $result)
    {
        $order = new OrderModel();
        foreach ($result as $key => $value) {
            $order->$key = $value;
        }
        return $order;
    }

    public static function fromForm(array|null $skip)
    {
        $order = new OrderModel();
        $vars = array_keys(get_object_vars($order));
        $vars = array_diff($vars, $skip);
        foreach ($vars as $key) {
            if (key_exists($key, $_POST)) {
                $order->$key = $_POST[$key];
            }
        }
        return $order;
    }

    public static function mergeFromForm(OrderModel &$order)
    {
        $vars = array_keys(get_object_vars($order));
        foreach ($vars as $key) {
            if (array_key_exists($key, $_POST)) {
                $order->$key = $_POST[$key];
            }
        }
    }


    public int|null $ID = null;
    public int|null $MotelID = null;
    public int|null $UserID = null;
    public string|null $created_at = null;
    public int|null $status = null;
}

?>