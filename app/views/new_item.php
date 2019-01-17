<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() {

if(isset($_SESSION['user'])&&$_SESSION['user']['roles_id'] ==1){

 ?>
 	
<?php global $conn; ?>


 <section class="center">
 	
	<div class="container">
	<div class="row">
		<div class="col-sm-8 offset-sm-2">
			<form action="../controllers/process_add_item.php" method="POST" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" required>
				</div>
					<div class="form-group">
					<label for="price">Price</label>
					<input type="number" class="form-control" min="1" name="price" id="price" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea type="text" class="form-control col-8" rows="5" name="description" id="description" required></textarea>
				</div>
				<div class="form-group">
					<label for="categories">Category</label>
					<select class="form-control col-8" rows="5" name="category_id" id="categories" required>
						
						<?php 

							$sql ="SELECT * FROM categories";
							$categories = mysqli_query($conn, $sql);
							foreach ($categories as $category) {
								//extract is another way of getting data. it transforms the column into variables
								extract($category);
								echo "<option value='$id'>$name</option>";
							}

						 ?>

					</select>
				</div>
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" id="image" class="form-control" name="image" required>
				</div>
				<button type="submit" class="btn btn-block bg-primary">Add New Item</button>
			</form>
		</div>
	</div>

</div>  <!-- end container -->

 </section>
	



<?php }else{

header('location:./error.php');
	} ?>








	
<?php }; ?>