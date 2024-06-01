<!DOCTYPE html>
<HTML lang="en">

<head>
    <link rel="stylesheet" href="../css/registration.css">
    <title>SIGN UP</title>
</head>

<body>
    <form action="registration_process.php" method="POST">
        <div class="box-form">
            <div class="left">
                <div class="overlay">
                    <h1>TRAVEL AGENCY</h1>
                </div>
            </div>


            <div class="right">
                
                <?php if (isset($_GET['message'])) { ?>
                    <p class = "message"><?php echo $_GET['message']; ?></p>
                <?php } ?>

                <h5>SIGN UP </h5>

                <div class="inputs">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>

                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>

                    <input type="text" id="address" name="address" placeholder="Address" required>

                    <input type="text" id="phone" name="phone" placeholder="Phone" required>

                    <input type="number" id="mobile" name="mobile" placeholder="Mobile" required>

                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>

                <br>

                <button type = "submit" name = "submit" id = "submit"> Register </button>
		
                <a href="login.php"> Already have an account? </a>

            </div>
        </div>
    </form>
</body>

</HTML>