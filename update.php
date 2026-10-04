<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $p_id=$_POST["p_id"];
    $p_name=$_POST["p_name"];
    $category=$_POST["category"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $s_name=$_POST["s_name"];

    $sql=$conn->prepare("update products set p_name=?,category=?,price=?,quantity=?,s_name=? where p_id=?");
    $sql->bind_param('ssdisi',$p_name,$category,$price,$quantity,$s_name,$p_id);

    if ($sql->execute()) {
        header("Location:dashboard.php");
        exit;
    }
}
?>