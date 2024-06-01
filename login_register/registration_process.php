<?php
    require('../dbconnection.PHP');
    
    if (isset($_POST['submit'])) {

        $first_name = stripslashes($_POST['first_name']);
        $first_name = mysqli_real_escape_string($con, $first_name);

        $last_name   = stripslashes($_POST['last_name']);
        $last_name    = mysqli_real_escape_string($con, $last_name);

        $address   = stripslashes($_POST['address']);
        $address  = mysqli_real_escape_string($con, $address);

        $phone   = stripslashes($_POST['phone']);
        $phone  = mysqli_real_escape_string($con, $phone);

        $mobile   = stripslashes($_POST['mobile']);
        $mobile  = mysqli_real_escape_string($con, $mobile);

        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "INSERT into `customer` (`first_name`,`last_name`, `address`, `phone`, `mobile`, `email`,`password`)
                     VALUES ('$first_name','$last_name','$address','$phone','$mobile','$email', '$password')";
        
        $result   = mysqli_query($con, $query);

        if ($result) {
			header("Location: login.php?message=Registration Successful");
		    exit();
		} else {
            header("Location: registration.php?message=Please input correct info");
		}
    }    
?>