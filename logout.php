<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$cookie = $_POST['cookie'];
	
	require_once 'connect.php';
	
	$sql = "SELECT COUNT('$cookie') FROM active_sessions;";
	$response = mysqli_query($conn, $sql);
	
	if($response == 1){
		$sql = "DELETE FROM active_sessions WHERE cookie = '$cookie';";
		mysqli_query($conn, $sql);
		
		$result = "1";
		echo $result;
	}
	mysqli_close($conn);
}
?>
