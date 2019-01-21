<?php $page="login"; ?>


<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { ?>
 
<section class="center w-bg pt-5">
	<div class="col-sm-6 center pt-4 g-bg border-round">
		<div class="container-fluid">
		<div class="jumbotron bg-dark">
			<h4 class="text-center text-white mt-5">Login</h4>
		</div>	
	</div>
	<form>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				<span class="validation"></span>

			</div>
			<div class="text-center py-4">
				<!-- <p><a href="./new_password_request.php">Forgot Password</a></p> -->
				<a href="./register.php" class="btn btn-secondary">Register</a>
				<button type="submit" class="btn btn-outline-danger" id="login">Login</button>
			</div>
	</form>
	
	</div>
	

</section>

<?php }; ?>




	

	