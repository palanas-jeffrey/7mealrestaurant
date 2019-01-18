<?php 

$host = 'localhost';//'db4free.net';
$username ='root' ;//'mealrestaurant';
$password ='';//'kainkain';
$dbname = 'ecom_db';//'meal_db';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}

 // echo 'connected succesfully';

 ?>