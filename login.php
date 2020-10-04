<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$cookie = generateCookie();
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM users WHERE email='$email' ";
    $response = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($response) === 1) {
        
        $row = mysqli_fetch_assoc($response);
		//start if
        if (password_verify($password, $row['password'])) {
            	$querry = "INSERT INTO active_sessions (user_id, cookie) VALUES ( (SELECT id FROM user WHERE email = '$email' LIMIT 1), '$cookie');";
	
				if (mysqli_query($conn, $querry)) {
					//Successfully
					echo $cookie;
				} else {
					//echo "Error deleting record: " . mysqli_error($conn);
					echo "Error";
			}
				mysqli_close($conn);

        } else{
			echo 'Password incorrect!';
		}
}
	$sql = "SELECT * FROM business_users WHERE email='$email' ";
    $response = mysqli_query($conn, $sql);
	if (mysqli_num_rows($response) === 1) {
        
        $row = mysqli_fetch_assoc($response);
		//start if
        if (password_verify($password, $row['password'])) {
            	$querry = "INSERT INTO active_sessions (user_id, cookie) VALUES ( (SELECT id FROM business_user WHERE email = '$email' LIMIT 1), '$cookie');";
	
				if (mysqli_query($conn, $querry)) {
					//Successfully
					echo $cookie;
				} else {
					//echo "Error deleting record: " . mysqli_error($conn);
					echo "Error";
			}
				mysqli_close($conn);

        } else{
			echo 'Password incorrect!';
		}
	}
}
function generateCookie($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>
