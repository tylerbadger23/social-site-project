<?php   
require 'config/config.php';
require 'includes/form_handlers/register.php';
require 'includes/form_handlers/login_handler.php';

?>


<!-- html bellow  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container form-section">
        <h1>Login To Social Site</h1>
        <div class="form-container">

            <div class="login-form">
                <form action="login.php" method="POST">

                    <!-- email -->
                    <div class="box-container first-box">
                        <label>Email</label>
                        <input type="email" name='log_email' placeholder="Email" value="<?php 
                            if(isset($_SESSION['log_email'])) {
                                echo $_SESSION['log_email'];
                            }?>" required>
                    </div>

                    <!-- password -->
                    <div class="box-container">
                        <label>Password</label>
                        <input type="password" name='log_password' placeholder="Password">
                    </div>

                    <!-- submit button -->
                    <div class="box-container">
                        <input type="submit" value="Login" name='login_button'>
                       <div class="error-message">
                           <?php  if(in_array("Email or password was incorrect<br>" , $error_array)) echo "Email or password was incorrect<br>";  
                        ?></div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
        


</body>
</html>