<?php 
 require_once './connect.php';
session_start();

$id =$_GET['id'];
// var_dump($_GET['id']);


$update_order_query= "SELECT status_id FROM orders WHERE id=$id;";

$order_update= mysqli_query($conn, $update_order_query);
$order_status = mysqli_fetch_assoc($order_update);



$update_order_status_id ="UPDATE orders SET status_id= 3 WHERE id= $id;";



$result= mysqli_query($conn,$update_order_status_id);


if (!$result) {
	echo mysqli_error($conn);
};

header('location: ../views/orders.php');

?>