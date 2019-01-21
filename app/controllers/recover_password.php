<?php 

session_start();
require_once './connect.php';
//Load Composer's autoloader
require "../../vendor/autoload.php";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




//user id and info
 $email = $_POST['email']; 
 // $username = "jeffreyjeff09";

$sql= "SELECT * FROM users WHERE email ='$email' ;";
$result =mysqli_query($conn,$sql);
$user = mysqli_fetch_assoc($result);

$id = $user['id'];
// var_dump($sql);

function generate_new_password() {
	$new_password = '';

	$source = array('0', '1', '2', '3', '4', 'A', 'B', 'C', 'D', 'E', 'F');

	for($i = 0; $i<10; $i++) {
		$index = rand(0,10); //generates a random number from 0-15

		//append random character
		$new_password .= $source[$index];
		// var_dump($index);

	}
	return $new_password;
}


		$new_gen_password = generate_new_password();
		$_SESSION['new_gen_password'] = $new_gen_password;

		//create a new order
// echo $new_gen_password;
		



$new_password = $new_gen_password;


  $password = password_hash($new_password,PASSWORD_DEFAULT);
// $password = password_hash($new_password,PASSWORD_BCRYPT);
 // $password = $new_password;
// echo"<hr>";
	//update password in data base
$sql_update = "UPDATE users SET password='$password' WHERE id= $id;";
mysqli_query($conn, $sql_update);

	//get all the details of the password
// echo $password;


// if (mysqli_query($conn, $sql_update)) {
// 	die("password_reset");
// 		alert ("hi");
// } else {
// 	echo mysqli_error($conn);
// }






//=====================



	$mail = new PHPMailer(true); 
	// Passing `true` enables exceptions


	$staff_email = '7mealrestaurant@gmail.com';
	$customer_email = $email;          //
	$subject = '7meal restaurant - Password Recovery';
	$body = '<div style="text-transform:uppercase;"><h3>"Please use this as your new password."</h3></div>'."<div>New Password: $new_gen_password</div>";
	try {
	    //Server settings
	    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = $staff_email;                       // SMTP username
	    $mail->Password = '77librekita';                     // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom($staff_email, '7mealRestaurant');
	    $mail->addAddress($customer_email);  // Name is optional

	    //Content
	    $mail->isHTML(true);  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body = $body;

	    // Route user to confirmation page
	    header('location: ../views/confirmation.php');

	    $mail->send();
	    // echo 'Message has been sent';

	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}


// if (mysqli_query($conn, $sql_update)) {
// 	die("password_reset");
// } else {
// 	echo mysqli_error($conn);
// }

		mysqli_close($conn);


	// Send email notification to customer
	// ==============================================================================


 ?>