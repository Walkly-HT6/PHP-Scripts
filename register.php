<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    if ( mysqli_query($conn, $sql) ) {
        $result = "1";

        mysqli_close($conn);

    } else {

        $result = "0";
        mysqli_close($conn);
    }
}

?>
