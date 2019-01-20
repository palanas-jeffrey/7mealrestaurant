<?php 


$host = 'db4free.net';
$username ='mealrestaurant';
$password ='kainkain';
$dbname = 'meal_db';


// $host = 'localhost';
// $username ='root' ;
// $password ='';
// $dbname = 'ecom_db';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}

 // echo 'connected succesfully';

 ?>