


$(document).ready( () =>{
	function validate_registration_form() {
		let errors = 0;
		let username= $('#username').val();
		let password= $('#password').val();
		let firstname= $('#firstname').val();
		let lastname= $('#lastname').val();
		let email= $('#email').val();
		let address= $('#address').val();



		//username should greater than or equal to 10 chars

		if (username.length < 10) {
			$("#username").next().html("Username should be atleast 10 characters");
			$("#username").next().css('color','red');
			errors++;
		}else{
			$('username').next().html('');
		}



	if (password.length < 8) {
		$('#password').next().html('Please provide a stronger password');
		$("#password").next().css('color','red');
		errors++;
	}else{
		$("#password").next().html(" ");
	}

	if (!email.includes("@")) {
		$('#email').next().html("Please provide a valid email");
		$("#email").next().css('color','red');
		errors++;
	}else{
		$('#email').next().html(" ");
	}


	//address
	if (!address !="") {
		$('#address').next().html("Please provide a valid address");
		$("#address").next().css('color','red');
		errors++;
	}else{
		$('#address').next().html(" ");
	}


	if (!firstname !="") {
		$('#firstname').next().html("Please provide a first name");
		$("#firstname").next().css('color','red');
		errors++;
	}else{
		$('#firstname').next().html(" ");
	}


	if (!lastname !="") {
		$('#lastname').next().html("Please provide a last name");
		$("#lastname").next().css('color','red');
		errors++;
	}else{
		$('#lastname').next().html(" ");
	}



	if (password !== $("#confirm_password").val()) {
		$('#confirm_password').next().html("Password should match");
		$("#confirm_password").next().css('color','red');
		errors++;
	}else{
		$('#confirm_password').next().html(" ");
	}


		if (errors > 0) {
			return false; //this means there are errors	}
	}else{
		return true;
	}


}






	$("#add_user").click( (e)=> {

		if (validate_registration_form()) {

		let username= $('#username').val();
		let password= $('#password').val();
		let firstname= $('#firstname').val();
		let lastname= $('#lastname').val();
		let email= $('#email').val();
		let address= $('#address').val();

		$.ajax({
			"url":'../controllers/create_user.php',
			"method": 'POST',
			"data": {
				'username': username,
				'password': password,
				'firstname': firstname,
				'lastname': lastname,
				'email': email,
				'address': address
			},
			"success":(data)=> {
				if (data == "user_exists") {
					$("#username").next().html("Username already exists");
					$("#username").next().css('color','red');
				}else{
					alert("user created successfully");
				//redirect browser
					window.location.replace("../../index.php")	
				}
			
			}		
		});
		}
	});


	// login and session
	$("#login").click( (e) =>{
		event.preventDefault();
		let username = $("#username").val();
		let password = $("#password").val();

		$.ajax({
			"url": '../controllers/authenticate.php',
			"method": 'POST',
			"data": {
				'username': username,
				'password': password
			},
			"success":(data) => {
				if (data == "login_failed") {
					$("#username").next().html("Please provide correct credentials");
				}else{
					window.location.replace("../views/home.php");
				}
			}
		})
	});

	//prep for add to cart

	$(document).on('click','.add-to-cart', (e) => {
		//to prevent default behavior and to override it with our own
		e.preventDefault();
		//prevent parent elements to be triggered
		e.stopPropagation();
		//target is the one who trigger the event
		let item_id = $(e.target).attr("data-id");
		let item_quantity = parseInt($(e.target).prev().val());

		$.ajax({
			"url" : "../controllers/update_cart.php",
			"method" : "POST",
			"data" : {
				'item_id': item_id,
				'item_quantity': item_quantity,
				'update_from_cart_page': 0 
			},
			"success": (data) => {
				$("#cart-count").html(data);
			}
		});
	});

	//edit_cart
	// e siya ang nagcreate ng event
	$(".item_quantity>input").on("input", (e) =>{
		let item_id = $(e.target).attr('data-id');
		let quantity = parseInt($(e.target).val());
		let price = parseFloat($(e.target).parent('tr').find(".item_price").html());

		subTotal = quantity*price;
		$(e.target).parents('tr'.find('.item_subtotal').html(subTotal.toFixed(2));

		$.ajax({
			"method": "POST",
			"url": "../controllers/update_cart.php",
			"data":{
				'item_id': item_id,
				'item_quantity': quantity,
				'update_from_cart_page':1
			},
			"success": (data) => {
				$("#cart-count").html(data);
			}
		});
	})

});




