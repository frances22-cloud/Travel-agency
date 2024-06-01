<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/login.css">
        <title>ADMIN LOGIN</title>
    </head>

    <body>
        <form action="login_process2.php" method="POST">
            <div class="box-form">
                <div class="left">
                    <div class="overlay">
                     <h1>ADMIN LOGIN</h1>
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
            
                    <a href="../login_register/login.php"> Not an admin? Login as customer </a>
            
                </div>
            </div>
        </form>
    </body>
</html>
