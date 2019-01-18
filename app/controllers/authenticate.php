<?php

	session_start(); //ma carry over kung may active
	require_once "./connect.php";


	$username= 'jeffreyjeff01';
 	$password = '123456789';
	// $username= $_POST['username'];
 // 	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username ='$username' ";

	$result = mysqli_query($conn,$sql);
	$user_info = mysqli_fetch_assoc($result);

	

	if(password_verify($password, $user_info['password'])){
		die("login_failed");
	}else{
		$_SESSION{'user'} = $user_info;
	}
	echo "login_success";

	// if(mysqli_num_rows($result)>0){
	// 	$_SESSION['logged_in_user'] = $username;
	// }else{
	// 	$_SESSION['error_message'] = "Login Failed";
	// }

	 //var_dump($_SESSION['user']);

	// header('location: ../views/home.php');



	mysqli_close($conn);

	?>