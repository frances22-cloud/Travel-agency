<?php
session_start();

if (!isset($_SESSION['role'])) {
    die( header('location:../admin_panel/admin_login.php?error=Please log in to access admin page') );
}

require("customers/functions/dbconnection.PHP");

$agentcode = $_GET['edit'];

if (isset($_POST['update_agent'])){
    $agentcode = $_POST['agent_code'];
    $agentfname = $_POST['first_name'];
    $agentlname = $_POST['last_name'];
    $agentemail = $_POST['agent_email'];
    $agentphoneno = $_POST['agent_phone_no'];
    $agentpass = md5($_POST['agnt_passwd']);
    $agentimage =$_FILES['agent_image']['name'];
    $agentimage_tmp_name = $_FILES['agent_image']['tmp_name'];
    $agentimage_folder ='images/'.$agentimage;
    
    
                            
    if(empty($agentcode)|| empty($agentfname)|| empty($agentlname) || empty($agentemail) || empty($agentphoneno) || empty($agentpass)
     ||empty($agentimage)){
       $message[]='please fill out all';
    }
    else{
    $update = "UPDATE `agent` SET agent_code='$agentcode' , first_name='$agentfname', last_name='$agentfname', 
    agent_email='$agentemail', agent_phone_no='$agentphoneno', agnt_passwd='$agentpass', agent_image='$agentimage'
    WHERE agent_code = $agentcode";
}

    $upload = mysqli_query($con,$update);
    if($upload){
      move_uploaded_file($agentimage_tmp_name, $agentimage_folder);
      $message[] = 'agent updated successfully';
    }
    else{
      $message[] = 'could not update agent';
    }
  
  $con->close();
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial scale = 1.0">
        <title>update-agent</title>

        <!-- font awesome cdn link     -->
        <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css ">

        <!--  custom css file link -->
        <link rel="stylesheet" href="admin_page_users.css">

    </head>
    <body>

        <?php
        if(isset($message)){
            foreach($message as $message){
            echo '<span class="message">' .$message.'</span>';
        }
    }
        ?>

        <div class="container">
            <div class="admin-product-form-container centered">


            <?php

                  $select = mysqli_query($con, "SELECT * FROM agent WHERE agent_code = '$agentcode' ");
                  while($row = mysqli_fetch_assoc($select)) {

            ?>

            <form action="<?php $_SERVER[ 'PHP_SELF'] ?>" METHOD="post" enctype="multipart/form-data">
            <h3>UPDATE AGENT DETAILS</h3>
            <input type="number" id="code" name="agent_code" placeholder="Write your code here..."  value="<?php $row['agent_code']; ?>" class="box">
            <input type="text" placeholder="Enter agent  first name..." name="first_name" value="<?php $row['first_name']; ?>" class='box'>
            <input type="text" placeholder="Enter agent  last name..." name="last_name" value="<?php $row['last_name']; ?>" class='box'>
            <input type="email" id="email" name="agent_email" placeholder="Write your email here..." class="box">
            <input type="number" id="phonenumber" name="agent_phone_no" placeholder="Write your phone number here..." class="box">
            <input type="password" id="pwd" name="agnt_passwd" placeholder="Write your password here..." class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name='agent_image' placeholder="enter agent image" name="agent_image" class='box'>
            <input type="submit" class="btn" name="update_agent" value="update agent">
            <a href="admin_page_agents.php" class="btn">go back</a>
        </form>


        <?php }; ?>

        </div>
</div>
    

    </body>
</html>