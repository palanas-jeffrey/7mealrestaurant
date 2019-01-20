<?php $page="users"; ?>


<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { 
 	
if(isset($_SESSION['user']) && $_SESSION['user']['roles_id']==1)
	
global $conn;

	?>

	<div class="container">
		<h4 class="text-center">User Admin Page</h4>
		<div class="row">
			<div class="col-sm-10 offset-sm-2">
				<table class="table table-responsive table-striped">
					<thead>
						<tr class="text-center">
							<th>Username</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php 

						$get_user_detail_query = "SELECT u.id, u.username, u.firstname, u.lastname, u.email, r.name AS role FROM users u JOIN roles r ON (u.roles_id = r.id);";

						$user_details = mysqli_query($conn, $get_user_detail_query); 
						// var_dump($user_details);
						foreach ($user_details as $indiv_user) {
							// var_export($indiv_user);
						?>
						 <tr>
						 	<td></td>
						 	<td><?php echo $indiv_user['firstname']; ?> </td>
						 	<td><?php echo $indiv_user['lastname']; ?></td>
						 	<td><?php echo $indiv_user['email']; ?></td>
						 	<td><?php echo $indiv_user['role']; ?></td>
						 	<td>
						 		<?php 
						 		$id = $indiv_user['id'];
						 		if($indiv_user['role'] =="admin"){ ?>
										<a href='../controllers/grant_admin.php?id=<?php echo $indiv_user['id']?>' class="btn btn-danger">Revoke Admin</a>
								<?php }else{ ?> 			
						 			<a href="../controllers/grant_admin.php?id=<?php echo $indiv_user['id']?>" class="btn btn-primary">Make Admin</a>
								<?php  } ?>
						 	</td>
						 </tr>
						<?php }; ?>
					</tbody>
				</table>
			</div><!-- end col -->
		</div> <!-- end row -->
	</div> <!-- end container -->






















<?php }; ?>