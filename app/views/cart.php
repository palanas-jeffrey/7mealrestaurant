<?php $page ="cart"; ?>

<?php require_once '../partials/template.php'; 

	require '../controllers/connect.php';

?>



<?php function get_page_content() { 


if(!isset($_SESSION['user']) || (isset($_SESSION['user'])) && ($_SESSION['user']['roles_id']) ==2){
	
	global $conn;
	?>

	<?php $page = "cart"; ?>
 
	<section class="center w-bg">
			<div class="container my-4">
		<div class="row">
			<div class="col-12">
				<h1>Cart Page</h1>
			</div>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="text-center">
						<th>Item Name</th>
						<th>Item Price</th>
						<th>Item Quantity</th>
						<th>Item Subtotal</th>
						<th>Actions</th>
					</tr>
				</thead>
					
	
<tbody>

 	<?php 
 	// var_dump($_SESSION['cart']);
 		if (isset($_SESSION['cart']) && count($_SESSION['cart']) !=0){
 			// echo 'may laman ang cart';
 			$cart_total = 0;

 			// var_dump($conn);
 			foreach($_SESSION['cart'] as $id => $qty) {
 				
 				$sql ="SELECT * FROM items WHERE id='$id'";
 				$result =mysqli_query($conn, $sql);
 				$item = mysqli_fetch_assoc($result);
 				$subTotal = $_SESSION['cart'][$id] * $item['price'];
 				// var_dump($_SESSION['cart'][$id]);
 				$cart_total += $subTotal;



 	 ?>

 	 <tr>
 	 	<td class="item_name"><?php echo $item['name']; ?></td>
 	 	<td class="item_price"><?php echo $item['price']; ?></td>
 	 	<td class="item_quantity">
 	 		<input type="number" value="<?php echo $qty; ?>" class="form-control" data-id=" <?php echo $id; ?>" min="1" oninput="validity.valid||(value='');">
 	 	</td>
 	 	<td class="item_subtotal"><?php echo $subTotal; ?></td>
 	 	<td class="item_action text-center">
 			<button class="btn btn-outline-danger item-remove" data-id="<?php echo $id; ?>">Remove from cart</button>
	 	</td>
 	 </tr>
 	<?php } ?>
 	 </tbody>
 	 <tfoot>
 	 	<tr>
 	 		<td class="text-right font-weight-bold" colspan="4">Total</td>
 	 		<td class="text-right font-weight-bold" id="total_price"><?php echo $cart_total; ?></td>
 	 		<td class="text-center">
 	 			<a href="./checkout.php" class="btn btn-outline-danger">Proceed to check out</a>
 	 		</td>

 	 	</tr>

 	 </tfoot>
 	 <?php 
 	 }else{
 	 	echo '<tr>
 	 			<td class="text-center" colspan="6"> No items in the cart</td>
 	 		</tr>
 	 		';
 	 } ?>
 	</table>


</div>
</div> <!-- end of container -->
	


	</section>

<?php }else{

header('location:./error.php');
	} ?>

	
<?php }; ?>

