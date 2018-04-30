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
        <h1>Welcome To Social Site</h1>
        <div class="form-container">

                        <!--  register form  -->

            <div class="register-form">
                <form action="register.php" method="POST" >

                    <!-- firstname -->
                    <div class="error-message-register">
                        <?php  if(in_array("Emails dont match<br>" , $error_array)) echo "First Name must be between 2 and 25 characters<br>";  ?>
                    </div>

                    <label>First Name</label>
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
                        if(isset($_SESSION['reg_fname'])) {
                            echo $_SESSION['reg_fname'];
                        }?>" required>
                    <br>

                    <!-- lastname -->
                    <div class="error-message-register">
                        <?php  if(in_array("Last Name must be between 2 and 25 characters<br>" , $error_array)) echo "Last Name must be between 2 and 25 characters<br>";  ?>
                    </div>
                    <label>Last Name</label>
                    <input type="text" name="reg_lname" placeholder="Last Name"  value="<?php 
                        if(isset($_SESSION['reg_lname'])) {
                            echo $_SESSION['reg_lname'];
                        }?>" required>
                    <br>

                    <!-- email -->
                    <div class="error-message-register">
                        <?php  if(in_array("Email already in use<br>" , $error_array)) echo "Email already in use<br>";  ?>
                        <?php  if(in_array("invalid email format<br>" , $error_array)) echo "invalid email format<br>";  ?>
                        <?php  if(in_array("Emails dont match<br>" , $error_array)) echo "Emails dont match<br>";  ?>   
                    </div>

                    <label>Email</label>    
                    <input type="email" name="reg_email" placeholder="Email"  value="<?php 
                        if(isset($_SESSION['reg_email'])) {
                            echo $_SESSION['reg_email'];
                        }?>" required>
                    <br>

                    <label>Confirm Email</label>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" required>
                    <br>

                    <!-- password-->
                    <div class="error-message-register">
                        <?php  if(in_array("passwords do not match<br>" , $error_array)) echo "passwords do not match<br>";  ?>
                        <?php  if(in_array("Your password can only contain english characters and numbers<br>" , $error_array)) echo "Your password can only contain english characters and numbers<br>";  ?>
                        <?php  if(in_array("Your password must be bewteen 5 and 30 characters<br>" , $error_array)) echo "Your password must be bewteen 5 and 30 characters<br>";  ?>
                    </div>
        

                    <label>Password</label>
                    <input type="password" name="reg_password" placeholder="Password" required>
                    <br>

                    <label>Confirm Password</label>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    
                    <!-- success messasge -->
                    <input type="submit" name="register_button" value='Register'>
                    <br>

                    <!-- success message -->
                    <?php  if(in_array("<span style='color:#14c800;'>Your are all set. Go ahead and login.</span><br>" , $error_array)) echo "<span style='color:#14c800;'>Your are all set. Go ahead and login.</span><br>";  ?>

                </form>
            </div>
        </div>
    </div>
        


</body>
</html>