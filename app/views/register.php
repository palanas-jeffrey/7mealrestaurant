<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { ?>
 

 <section class="center">
 	<div class="container-fluid">
		<div class="jumbotron bg-dark">
			<h1 class="text-center text-white">Register</h1>
		</div>	
	</div>
	<content class=" row col-lg-12 mb-5 ">
					<div class="col-12 col-md-12 col-lg-6 ">
						<form class="form-group">
							<div class="form-group">
								<label for="name">First Name:</label>
								<input id="firstname" name="firstname" type="text" class="form-control" placeholder="Enter your first name">
								<span class="validation"></span>
							</div>
							<div class="form-group">
									<label for="email">Last Name:</label>
									<input id="lastname" name="lastname" type="text" class="form-control" placeholder="Enter your last name ">
								<span class="validation"></span>
							</div>
								<div class="form-group">
									<label for="email">Email:</label>	
									<input id="email" type="text" name="email" class="form-control" placeholder="Enter your email address">
								<span class="validation"></span>
							</div>
							<div class="form-group">
									<label for="address">Address:</label>
									<input id="address" name="address" type="text" class="form-control" placeholder="Enter your home address">
								<span class="validation"></span>
							</div>
							
					</div>
					<div id="" class="col-12 col-md-12 col-lg-6 " >
							<div class="form-group">
								<label for="username">Username:</label>
								<input id="username" name="username"  type="text" class="form-control" placeholder="Enter your username">
								<span class="validation"></span>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
								<span class="validation"></span>
							</div>
							<div class="form-group">
								<label for="topic">Confirm Password:</label>
								<input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="Confirm your Password">
								<span class="validation"></span>
							</div>
							
							
					</div>
						</form>
							
							<!-- <button id="submit" type="button" class=" shadow btn btn-p btn-block mt-3">Login</button> -->

			
					
					<div class="text-center py-5 mb-5">
						<a href="./login.php" class="btn btn-secondary ">Login</a>
						<button id="add_user" type="button" class=" shadow btn btn-p btn-block mt-3">Register</button>

					</div>

				</content>
	

	
<?php }; ?>

 </section>
	