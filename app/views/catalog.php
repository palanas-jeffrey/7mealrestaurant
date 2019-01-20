
<?php $page ="catalog"; ?>

<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() {

if(!isset($_SESSION['user']) || (isset($_SESSION['user'])) && ($_SESSION['user']['roles_id']) ==2){

 
global $conn; ?>

<?php  ?>

<section class="center w-bg">
		<div class="container-fluid">
		<div class="row">

			<!-- categories -->
			<div class="col-sm-2">
				<h2>Categories</h2>
				<ul class="list-group red">
					<a href="catalog.php">
						<li class="list-group-item red">All</li>
					</a>

					<?php 
					$sql= "SELECT * FROM categories";
					$categories = mysqli_query($conn,$sql);
					foreach ($categories as $category) {?>
						<a href="catalog.php?category_id=<?php echo $category['id'] ; ?>">
							<li class="list-group-item red">
								<?php echo $category['name']; ?>	
							</li>	
						</a>
						
					<?php } ?>	
				</ul>
				<h2>Sort</h2>
				<ul class="list-group border">
					<a href="../controllers/sort.php?sort=asc">
						<li class="list-group-item red">
							Price(Lowest to Highest)
						</li>
					</a>
					<a href="../controllers/sort.php?sort=desc">
						<li class="list-group-item red">
							Price(Highest to Lowest)
						</li>
					</a>
				</ul>

			</div>  <!-- end of categories -->


			<!-- items -->
			<div class="col-sm-10">
				<div class="container">
					<?php 
					  $sql2 ="SELECT * FROM items";
					  // $sql2 ="SELECT * FROM items ORDER BY price ASC";

					if (isset($_GET['category_id'])) {
						$sql2 .=" WHERE category_id =". $_GET['category_id'];
					}

					if (isset($_SESSION['sort'])) {
						//var_dump($_SESSION['sort']);
						$sql2 .=$_SESSION['sort'];
					}

					$items = mysqli_query($conn, $sql2);

					echo "<div class='row'>";
					foreach ($items as $item) { ?>
						<div class="col-sm-3" >
							<div class="card">
								<img class="card-img-top" src="<?php echo $item['image_path']; ?>">
								<div class="card-body">
									<h4 class="card-title">
										<?php echo $item['name']; ?>
									</h4>
									<p class="card-text">
										<?php echo $item['description']; ?>
										<br>
										<?php echo $item['price']; ?>
									</p>
								</div>


								<div class="card-footer">
									<input type="number" class="form-control" value="1">
									<button type="submit" class="btn btn-block btn-outline-danger add-to-cart" data-id=" <?php echo $item['id']; ?>">Add to cart
									</button>
								</div>


							</div> <!-- end card -->	
						</div> <!-- end item col -->


						<?php } echo "</div>" ?>    <!-- end of items row -->

					</div>
				</div>
			</div>

	</div>
</section>




<?php }else{

header('location:./error.php');
	} ?>




		<?php }; ?>

