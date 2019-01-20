<?php $page="login"; ?>


<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { ?>
 
<section class="center w-bg pt-5">
	<div class="col-sm-6 center pt-4 g-bg border-round">
		<div class="container-fluid">
		<div class="jumbotron bg-dark">
			<h4 class="text-center text-white mt-5">Request for New Password</h4>
		</div>	
	</div>
	<form>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
				<span class="validation"></span>
			</div>
			<div class="text-center py-4">
				<button type="submit" class="btn btn-outline-danger" id="requestPassword">Request New Password</button>
			</div>
	</form>
	
	</div>
	

</section>

<?php }; ?>
