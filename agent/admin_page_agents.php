<?php
session_start();

if (!isset($_SESSION['role'])) {
	die(header('location:../admin_panel/admin_login.php?error=Please log in to access admin page'));
}

require("../dbconnection.PHP");


if (isset($_POST['add_agent'])) {
	$agentcode = $_POST['agent_code'];
	$agentfname = $_POST['first_name'];
	$agentlname = $_POST['last_name'];
	$agentemail = $_POST['agent_email'];
	$agentphoneno = $_POST['agent_phone_no'];
	$agentpass = md5($_POST['agnt_passwd']);
	$agentimage = $_FILES['agent_image']['name'];
	$agentimage_tmp_name = $_FILES['agent_image']['tmp_name'];
	$agentimage_folder = '../images/' . $agentimage;

	if (
		empty($agentcode) || empty($agentfname) || empty($agentlname) || empty($agentemail) || empty($agentphoneno) || empty($agentpass)
		|| empty($agentimage)
	) {
		$message[] = 'please fill out all';
	} else {
		$sql = "INSERT INTO `agent`(`agent_code`,`first_name`, `last_name`, `agent_email`,`agent_phone_no`, `agnt_passwd`, `agent_image`) 
        VALUES ('$agentcode','$agentfname', '$agentlname', '$agentemail' ,'$agentphoneno', '$agentpass', '$agentimage' )";
	}

	$upload = mysqli_query($con, $sql);
	if ($upload) {
		move_uploaded_file($agentimage_tmp_name, $agentimage_folder);
		$message[] = 'new agent added successfully';
	} else {
		$message[] = 'could not add agent';
	}

	$con->close();
}

if (isset($_GET['delete'])) {
	$agentcode = $_GET['delete'];
	mysqli_query($con, "DELETE FROM agent WHERE agent_code = $agentcode ");
	header('location:admin_page_agents.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page</title>

	<!-- font link -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

	<script src="https://kit.fontawesome.com/2592ae0b16.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="admin_page_users.css">

</head>

<body>

	<?php
	if (isset($message)) {
		foreach ($message as $message) {
			echo '<span class="message">' . $message . '</span>';
		}
	}
	?>
	<div class="container">

		<div class="admin-product-form-container">
			<a href="../admin_panel/admin_panel.php" class = "links">
				<p> BACK TO ADMIN PANEL </p>
			</a>

			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
					
				<h3>Add new agent</h3>

				<input type="number" id="code" name="agent_code" placeholder="Write your code here..." class="box">
				<input type="text" id="fname" name="first_name" placeholder="Write your first name here..." class="box">
				<input type="text" id="lname" name="last_name" placeholder="Write your last name here..." class="box">
				<input type="email" id="email" name="agent_email" placeholder="Write your email here..." class="box">
				<input type="number" id="phonenumber" name="agent_phone_no" placeholder="Write your phone number here..." class="box">
				<input type="password" id="pwd" name="agnt_passwd" placeholder="Write your password here..." class="box">
				<input type="file" accept="image/png, image/jpeg, image/jpg" name="agent_image" class="box">
				<input type="submit" class="btn" name="add_agent" value="Add an agent">
			</form>

		</div>

		<?php
		require("../dbconnection.PHP");

		$sql = "SELECT * FROM agent";
		$select = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);

		?>

		<div class="product-display">

			<table class="product-display-table">

				<thead>
					<tr>
						<td>Agent Image</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td colspan="2">Action</td>
					</tr>
				</thead>

				<?php

				while ($row = mysqli_fetch_array($select)) {

				?>

					<tr>
						<td><img src="images/<?php echo $row['agent_image']; ?>" height="100" alt=""></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td>
							<a href="admin_update_agents.php?edit=<?php echo $row['agent_code']; ?>" class="btn"> <i class=fas fa-edit></i> edit </a>
							<a href="admin_page_agents.php?delete=<?php echo $row['agent_code']; ?>" class="btn"> <i class=fas fa-trash></i> delete </a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
</body>

</html>