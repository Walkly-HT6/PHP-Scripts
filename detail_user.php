<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $email = $_POST['email'];

        require_once 'connect.php';


        $sql = "SELECT * FROM users WHERE email='$email' ";

        $response = mysqli_query($conn, $sql);

        $num_rows = mysqli_num_rows($response);

        if($num_rows === 1){
                $row = mysqli_fetch_assoc($response);

                $user_details['first_name'] = $row['first_name'];
                $user_details['last_name'] = $row['last_name'];
                $user_details['email'] = $row['email'];
                $user_details['joined_date'] = $row['joined_date'];
				$user_details['is_business'] = "false";


                echo json_encode($user_details);
                mysqli_close($conn);


        } else{

                $sql = "SELECT * FROM business_users WHERE email='$email' ";

                $response = mysqli_query($conn, $sql);

                if($num_rows === 1){
                        $row = mysqli_fetch_assoc($response);
                        $user_details['company_name'] = $row['company_name'];
						$user_details['business_hours'] = $row[' business_hours'];
                        $user_details['offers'] = $row['offers'];
                        $user_details['first_name'] = $row['first_name'];
                        $user_details['last_name'] = $row['last_name'];
                        $user_details['phone_number'] = $row['phone_number'];
                        $user_details['description'] = $row['description'];
                        $user_details['email'] = $row['email'];
						$user_details['is_business'] = "true";


                        echo json_encode($user_details);
                        mysqli_close($conn);


                }
        }


}
?>
