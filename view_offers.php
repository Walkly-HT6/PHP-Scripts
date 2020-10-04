<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD']=='GET') {
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM offers WHERE 1;";
	
  $response = mysqli_query($conn, $sql);
	
	$counter = 0;
	$offers_list;
	
	while($row=mysqli_fetch_assoc($response)){
		$offer_details['date_from_to'] = $row['date_from_to'];
		$offer_details['coupon_count'] = $row['coupon_count'];
		$offer_details['description'] = $row['description'];
		$offer_details['points'] = $row['points'];
		
		json_encode($offer_details);
		$counter++;
		
		$temp = (string)$counter;
		$offers_list["Offer #$temp"] = $offer_details;
	}
	echo json_encode($offers_list);

}
?>
