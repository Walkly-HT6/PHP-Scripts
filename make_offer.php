<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] =='POST'){

 //   $categoryID = $_POST['categoryID'];
    //$firmName = $_POST('firmName');
    $date_from_to=$_POST['date_from_to'];
    $coupon_countstr=$_POST['coupon_count'];
    $coupon_count=(int)$coupon_countstr;

    $business_user_idstr=$_POST['business_user_id'];
    $business_user_id=(int)$business_user_idstr;
    $description = $_POST['description'];
    //$address = $_POST('address');
    $pointsstr = $_POST['points'];
    $points=(int)$pointsstr;
    //$unitsPerOffer = $_POST('unitsPerOffer');
    //$bussinessHours = $_POST('bussinessHours');
    //$dateFromToDateDue = $_POST('dateFromToDateDue');
    require_once 'connect.php';

    $sql = "INSERT INTO offers (date_from_to, coupon_count, business_user_id, description, points) VALUES ('$date_from_to', '$coupon_count', '$business_user_id','$description', '$points')";
    if ( mysqli_query($conn, $sql) ) {
        $result = "1";

        mysqli_close($conn);

    } else {

        $result = "0";
        mysqli_close($conn);
    }
}

?>
