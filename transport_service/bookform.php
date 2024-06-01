<?php

   $connection = mysqli_connect('localhost','root','','travel-agency-management-system');

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrival = $_POST['arrival'];
      $depature = $_POST['depature'];

      $request = " insert into book_form(name, email, phone, address, location, guests, arrival, depature) values('$name','$email','$phone','$address','$location','$guests','$arrival','$depature') ";
      mysqli_query($connection, $request);

      header('location:book.php'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>