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
		$offer_details['id'] = $row['id'];
		$offer_details['date_from_to'] = $row['date_from_to'];
		$offer_details['coupon_count'] = $row['coupon_count'];
		$offer_details['description'] = $row['description'];
		$offer_details['points'] = $row['points'];
		$offer_details['business_user_id'] = $row['business_user_id'];
		$business_user_id_ = $row['business_user_id'];
		
        $querry = "SELECT * FROM business_users WHERE id='$business_user_id_' ";
        $resp = mysqli_query($conn, $querry);
        $rUw = mysqli_fetch_assoc($resp);
        $user_details['company_name'] = $rUw['company_name'];
		$user_details['business_hours'] = $rUw[' business_hours'];
        $user_details['offers'] = $rUw['offers'];
        $user_details['first_name'] = $rUw['first_name'];
        $user_details['last_name'] = $rUw['last_name'];
        $user_details['phone_number'] = $rUw['phone_number'];
        $user_details['description'] = $rUw['description'];
        $user_details['email'] = $rUw['email'];
		$user_details['is_business'] = "true";
		json_encode($user_details);
		
		$offer_details['business_user_details'] = $user_details;
		
		
		json_encode($offer_details);
		$counter++;
		
		$temp = (string)$counter;
		$offers_list["Offer #$temp"] = $offer_details;
	}

	echo (string) json_encode($offers_list);

	
	
}
?>
