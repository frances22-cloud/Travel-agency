<?php
@include '../dbconnection.PHP';

if (isset($_POST['update_users'])) {
    $update_id = $_POST['update_id'];
    $update_first_name = $_POST['update_first_name'];
    $update_last_name = $_POST['update_last_name'];
    $update_address = $_POST['update_address'];
    $update_phone = $_POST['update_phone'];
    $update_mobile = $_POST['update_mobile'];
    $update_email = $_POST['update_email'];

    $update_query = mysqli_query($con, "UPDATE customer SET first_name = '$update_first_name', last_name = '$update_last_name' , address = '$update_address', phone = '$update_phone', mobile = '$update_mobile', email ='$update_email' WHERE id = '$update_id'");

    if ($update_query) {
        header('location: edit_users.php');
        $message[] = 'item updated succesfully';
    } else {

        header('location: edit_users.php');
        $message[] = 'item could not be updated';
    }
}

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

                <tr>
                  <th>ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th colspan="2" align="center">operations</th>

                </tr>

                    <tbody>
                        <?php

                        $select_users = mysqli_query($con, "SELECT * FROM customer ");
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
                                        <a href="all_users.php?edit=<?php echo $row['id']; ?>" class="edit-btn"> <i class="fas fa-edit"></i> update </a>
                                        <a href="delete_users.php?delete=<?php echo $row['id']; ?>" class="delete-btn"> <i class="fas fa-trash"></i> Delete </a>
                                    </td>
                                </tr>

                        <?php
                            };
                        } else {
                            echo "<div class='empty'>no items to edit</div>";
                        };
                        ?>
                    </tbody>
                </table>
                


            </section>

            <section class="edit-form-container">

                <?php

                if (isset($_GET['edit'])) {
                    $edit_id = $_GET['edit'];
                    $edit_query = mysqli_query($con, "SELECT * FROM customer  WHERE id = $edit_id");
                    if (mysqli_num_rows($edit_query) > 0) {
                        while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
                ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id']; ?>">
                                <input type="text" class="box" required name="update_first_name" value="<?php echo $fetch_edit['first_name']; ?>">
                                <input type="text" class="box" required name="update_last_name" value="<?php echo $fetch_edit['last_name']; ?>">
                                <input type="text" class="box" required name="update_address" value="<?php echo $fetch_edit['address']; ?>">
                                <input type="number" class="box" required name="update_phone" value="<?php echo $fetch_edit['phone']; ?>">
                                <input type="number" class="box" required name="update_mobile" value="<?php echo $fetch_edit['mobile']; ?>">
                                <input type="text" class="box" required name="update_email" value="<?php echo $fetch_edit['email']; ?>">
                                <input type="submit" value="update the user" name="update_users" class="btn">
                                <input type="reset" value="cancel" id="close-edit" class="option-btn">
                            </form>
                            <a href ="../admin_panel/admin_panel.php" class="style"><p>Go back to panel</p>

                <?php
                        };
                    };
                   
                };
                ?>

            </section>

    </div>


</body>

</html>