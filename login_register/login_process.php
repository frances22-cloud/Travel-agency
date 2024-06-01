<?php      
    session_start();
    include('../dbconnection.PHP'); 

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];  
        $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  

        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from `customer` where email = '$email' and password = '$password'";  
       
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            $_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];

            echo '<script>alert("Login Successful")</script>';

            header('Refresh: 1; URL=../index/index.php');
            exit();
        } else {
            header("Location: login.php?error=Incorrect email or password");
        } 
    }
    
    mysqli_close($con);
?>  