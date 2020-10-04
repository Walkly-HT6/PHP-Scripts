<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $company_name = $_POST['company_name'];
    $category_idstr = $_POST['category_id'];
    $category_id=(int)$category_idstr;
    $business_hours= $_POST['business_hours'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number=$_POST['phone_number'];
    $description=$_POST['description'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $city= $_POST['city'];
    $street_name=$_POST['street_name'];
    $post_codestr=$_POST['post_code'];
    $post_code=(int)$post_codestr;
    $built_numberstr=$_POST['built_number'];
    $built_number=(int)$built_numberstr;
    $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "INSERT INTO business_users(company_name, category_id, business_hours, first_name, last_name, phone_number, description, email, password) VALUES ('$company_name', '$category_id','$busess_hours','$first_name','$last_name','$phone_number','$description','$email','$password')";
    
    if ( mysqli_query($conn, $sql) ) {
        $result = "1";

        mysqli_close($conn);

    } else {

        $result = "0";
        mysqli_close($conn);
    }
}

?>
