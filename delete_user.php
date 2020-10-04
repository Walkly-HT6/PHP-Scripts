<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email = $_POST['email'];	
	$cookie = $_POST['cookie'];
	
	require_once 'connect.php';
	
	$sql = " SELECT COUNT(id) FROM users WHERE email = '$email'; ";
	$response = mysqli_query($conn, $sql);
	
	if($response == 1){
		//normal user
		$sql = " DELETE FROM users WHERE email = '$email'; ";
		mysqli_query($conn, $sql);
		
		$sql = " DELETE FROM active_sessions WHERE cookie = '$cookie'; ";
		mysqli_query($conn, $sql);
		
	}else{
		$sql = " DELETE FROM business_users WHERE email = '$email'; ";
		mysqli_query($conn, $sql);
		
		$sql = " DELETE FROM active_sessions WHERE cookie = '$cookie'; ";
		mysqli_query($conn, $sql);
		
	}
	mysqli_close($conn);
	
}

?>
