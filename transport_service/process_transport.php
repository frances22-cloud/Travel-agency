
<?php
include("dbconnection.php");
session_start();
$sql = mysqli_connect("localhost","root","","travel_agency");
  $transport_type=$_POST["transport_type"];
  $ticket_type=$_POST["ticket_type"];
  $service_price=$_POST["service_price"];
  $campany_type_name=$_POST["campany_type_name"];
  $HQ_address = $_POST["HQ_address"];
  $description = $_POST["description"];
  $is_partner = $_POST["is_partner"];

$sql = "INSERT INTO `transport_service`(transport_type,ticket_type,service_price,campany_type_name,HQ_address, description, is_partner) 
   VALUES('$transport_type', '$ticket_type','$campany_type_name','service_price','$HQ_address','$description','$is_partner')";

  if(mysqli_query($conn,$sql))
  {
    echo "New Record inserted successfully";
  }
  else{
  echo "Error: Record not added".mysqli_error($conn);
}
?>