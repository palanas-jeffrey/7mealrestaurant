

<!-- initial approach -->

<!-- login.php -->


<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { ?>
 

	<div class="container-fluid">
		<div class="jumbotron bg-dark">
			<h4 class="text-center text-white mt-5">Login</h4>
		</div>	
	</div>
	<form action="../controllers/authenticate.php" method="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				<span class="validation"></span>
			</div>
			<div class="text-center py-4">
				<a href="./register.php" class="btn btn-secondary">Register</a>
				<button type="submit" class="btn btn-primary" id="login">Login</button>
			</div>
	</form>

	
<?php }; ?>



<!-- 
authenticate.php -->


<?php

	session_start(); //ma carry over kung may active
	require_once "./connect.php";


	$username= $_POST['username'];
 	$password = $_POST['password'];


	$sql = "SELECT * FROM users WHERE username ='$username' ";

	$result = mysqli_query($conn,$sql);
	$user_info = mysqli_fetch_assoc($result);

	if(!password_verify( $password, $user_info['password'])){
		die("login_failed");
	}else{
		$_SESSION{'user'} = $user_info;
	}
	echo "login_success";
	mysqli_close($conn);


	if(mysqli_num_rows($result)>0){
		$_SESSION['logged_in_user'] = $username;
	}else{
		$_SESSION['error_message'] = "Login Failed";
	}

	header('location: ../views/home.php');



	mysqli_close($conn);

	?>