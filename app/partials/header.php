<header class="pt-2">
	
<div class="pagewidth center pl-4">
	<h1 class="hstyle "><span class="red">7Meal</span>Restaurant</h1>
</div>
<div class="redbg">
	<nav class="navbar navbar-expand-lg navbar-dark pagewidth center ">
		<div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="navbar-nav" class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-white" href="home.php"> Home </a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-white" href="catalog.php"> Catalog </a>
<!-- 
<?php //var_dump($_SESSION['cart']); ?>
<?php// var_export($_SESSION['cart']); ?> -->
				</li>
					<li class="nav-item">
					<a class="nav-link text-white" href="#"> Order <span class="badge bg-light text-dark" id="cart-count">
						<?php 
							if (isset($_SESSION['cart'])) {
								echo array_sum($_SESSION['cart']);
							}else{
								echo 0;
							}
						 ?>
					</span> </a>
				</li>
				<?php if (isset($_SESSION['user'])) { ?>

				 	<li class="nav-item">
				 		<a class="nav-link text-white" href="../controllers/logout.php"> Logout </a>
				 	</li>

				 <?php }else{ ?>
				 		<li class="nav-item">
				 			<a class="nav-link text-white" href="./login.php"> Login </a>
			 		</li>	

				 		<li class="nav-item">
				 			<a class="nav-link text-white" href="./register.php"> Register </a>
				 		</li>

				 		<form class="form-inline my-2 my-lg-0">
					      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
					    </form>
				 
			</ul>
		</div> 
		</div>
		
		
	</nav>
</div>

</header>


	<?php } ?>