<?php $page="orders"; ?>

<?php require_once '../partials/template.php'; ?>


<?php function get_page_content() { 
	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] == 1){
		global $conn;
	?>
 	
<section class="center w-bg">
	<div class="container">
		
		<div class="row">

			<div class="col-sm-8 offset-sm-2">
				<h2 class="text-center">Orders Admin Page</h2>
				<table class="table table-striped">
					<thead>
						<th>Transaction Code</th>
						<th>Status</th>
						<th>Actions</th>
					</thead>
					<tbody>
					<?php 
						$order_query ="SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON (o.status_id = s.id);";
						$orders = mysqli_query($conn, $order_query);
						foreach($orders as $order){
							// var_dump($order);

							 ?>
							<tr>
								<td><?php echo $order['transaction_code']; 

								?></td>
								<td><?php echo $order['status'];?></td>
								<td>
									<?php if($order['status']== "pending"){ ?>
										<a href="../controllers/complete_order.php?id=<?php echo $order['id']; ?>"><button class="btn btn-outline-primary">Complete Order</button></a>
										<a href="../controllers/cancel_order.php?id=<?php echo $order['id']; ?>"><button class="btn btn-outline-danger">Cancel Order</button></a>
									<?php }; ?>
								</td>
							</tr>
							<?php }; ?>	
					</tbody>
				</table>
				
			</div>
		</div>
	</div>

</section>

	

<?php }else{
	header('location: ./error.php');
} ?>	
<?php } ?>