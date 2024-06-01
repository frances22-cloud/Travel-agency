<?php
@include '../dbconnection.PHP';


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($con, "DELETE FROM `customer` WHERE id = $delete_id ") or die('query failed');
    if ($delete_query) {
        
        $message[] = 'user has been deleted';
    } else {
        
        $message[] = 'user could not be deleted';
    };
};
?>



<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="all_users.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>

    </style>
</head>

<body>

    

                <table style="margin-left: 10px;">

                  <thead>
                  <th>ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th colspan="2" align="center">operations</th>
                    </thead>

                    <tbody>
                        <?php

                        $select_users = mysqli_query($con, "SELECT * FROM `customer`");
                        if (mysqli_num_rows($select_users) > 0) {
                            while ($row = mysqli_fetch_assoc($select_users)) {
                        ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['email']; ?></td>

                                    <td>
                                        <a href="delete_users.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"><i class="fas fa-trash"></i> Delete </a>
                                        <a href="edit_users.php?edit=<?php echo $row['id']; ?>" class="edit-btn" onclick="return confirm('are your sure you want to edit this?');"><i class="fas fa-edit"></i> update </a>
                                    </td>
                                </tr>

                        <?php
                            };
                        } else {
                            echo "<div class='empty'>no items to delete</div>";
                        };
                        ?>
                    </tbody>
                </table>
                <a href ="../admin_panel/admin_panel.php" class="style"><p>Go back to panel</p>


            </section>

    </div>



</body>

</html>

