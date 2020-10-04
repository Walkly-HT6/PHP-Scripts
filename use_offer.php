<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	$email = $_POST['offer_id'];
	$offer_id = $_POST['offer_id'];
	$cookie = $_POST['cookie'];
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM active_tickets WHERE offer_id = '$offer_id';";
	
    $response = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($response);

	 for($i = 0; $i < $count; $i += 1){
		$row=mysqli_fetch_assoc($response);	
	 }
	 $sql = "UPDATE SET coupon_count = (coupon_count - 1) WHERE offer_id = '$offer_id';";
	 $resp = mysqli_query($conn, $sql);
	 
	 $coupon_code = $row['ticket_value'];
	 echo $coupon_code;
	
	mysqli_close($conn);
	
}


?>
