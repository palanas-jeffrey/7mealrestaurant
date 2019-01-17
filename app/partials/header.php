<header class="pt-2">
	
	<div class="pagewidth center pl-4 ">
		<h1 class="hstyle "><span class="red">7Meal</span>Restaurant</h1>
	</div>
	<div class="redbg ">
		<nav class="navbar navbar-expand-lg navbar-light pagewidth center">
			<div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="navbar-nav" class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
					<?php 

					if(!isset($_SESSION['user']) || (isset($_SESSION['user'])) && ($_SESSION['user']['roles_id'] ==2)) {
					?>
						<li class="nav-item">
							<a class="nav-link text-light" href="home.php"> Home </a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-light" href="catalog.php"> Catalog </a>
<!-- 
<?php //var_dump($_SESSION['cart']); ?>
<?php// var_export($_SESSION['cart']); ?> -->
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="cart.php"> Order <span class="badge bg-light text-dark" id="cart-count">
								<?php 
								if (isset($_SESSION['cart'])) {
									echo array_sum($_SESSION['cart']);
								}else{
									echo 0;
								}
								?>
							</span> </a>
						</li>
					<?php } elseif(isset($_SESSION['user']) && ($_SESSION['user']['roles_id'] == 1)) {?>
						<li class="nav-item">
							<a class="nav-link text-light" href="./items.php">Items</a>
						</li>
					<?php } ?>
					<?php if (isset($_SESSION['user'])) { ?>
						<li class="nav-item">
							<a class="nav-link text-light" href="./profile.php">WELCOME, <?php echo $_SESSION['user']['firstname']; ?> </a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-light" href="../controllers/logout.php"> Logout </a>
						</li>

					<?php }else{ ?>
						<li class="nav-item">
							<a class="nav-link text-light" href="./login.php"> Login </a>
						</li>	

						<li class="nav-item">
							<a class="nav-link text-light" href="./register.php"> Register </a>
						</li>

						<?php } ?>
	
					</ul>
				</div> 
			</div>
		<!-- 		<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
				</form> -->

		</nav>
	</div>

</header>


