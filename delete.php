<?php 
include 'db.php'; 
 
$product_id = $_GET["p_id"]; 
 
$sql = $conn->prepare("delete from products where p_id=?"); 
$sql->bind_param('i', $product_id); 
 
if ($sql->execute()) { 
    header('Location:dashboard.php'); 
    exit; 
} 
?> 