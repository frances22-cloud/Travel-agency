<?php
  $conn = mysqli_connect("localhost","root", "", "travel_agency");
  $sql = "SELECT * FROM transport_service";
  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="t_design.css">
  <link rel="stylesheet" href="tp-service.css">
  <link rel="stylesheet" href="css/login.css">
  <title>Transport and company details</title>
</head>
<body>
<table style="width:100px;">
    <h1>Transport and comapny details</h1>
    <thead>
      <tr>
        <th> S/N</th>
        <th>Transport Type</th>
        <th>Ticket Type</th>
         <th>Service price</th>
          <th>Company name</th>
           <th>HQ_address</th>
            <th>Description</th>
             <th>Partnership</th>
    <th colspan='2'>Actions</th>
    
    </tr>
    </thead>
    <?php
      if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
    ?>
    <tbody>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['transport_type']; ?></td>
        <td><?php echo $row['ticket_type']; ?></td>
        <td><?php echo $row['service_price']; ?></td>
        <td><?php echo $row['company_type_name']; ?></td>
        <td><?php echo $row['HQ_address']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['is_partner']; ?></td>
      <td> <button class="btn btn_primary"><a href="" class="text_color">Update</a></button></td>
  <td> <button class="btn btn_secondary"><a href="delete.php"? deleteid='.$id' onclick="return confirm('are you sure you want to delete?');" class="text_color">Delete</a></button></td>
    <br>
     <!--<a href="signup.php?id=<?php echo $row['id']; ?>"class="btn-edit"> </i>ADD_USER</a>-->
    </tr>
    </tbody>
    <?php
     }
   };
    ?>
  </table>
</body>
</html>