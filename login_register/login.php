<!DOCTYPE html>
<HTML lang="en">

<head>
    <link rel="stylesheet" href="../css/login.css">
    <title>LOGIN</title>

</head>

<body>
    <form action="login_process.php" method="POST">
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

                <?php if (isset($_GET['error'])) { ?>
                    <p class = "error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <h5>Login</h5>

                <div class="inputs">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <br>
                    <input type="password" id="pass" name="pass" placeholder="Password" required>

                </div>
                <br><br><br>

                <button type = "submit" name = "submit" id = "submit"> Login </button>
            
                <a href="registration.php"> Not a member yet? Create a new account </a>
                <br>
                <br>
                <a href="../admin_panel/admin_login.php"> Login as admin </a>

            </div>

        </div>
    </form>
</body>

</HTML>