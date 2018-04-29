<?php 
//declaring variables

$fname = '';
$lname = '';
$email = '';
$email2 = '';
$password = '';
$password2 = '';
$date = '';
$error_array = array();

//check if submitted
if(isset($_POST['register_button'])) {

    //firstname
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;

    #lastname
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    #email
    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ','',$email);
    $email = ucfirst(strtolower($email));
    $_SESSION['reg_email'] = $email;

    #email 2
    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = str_replace(' ','',$email2);
    $email2 = ucfirst(strtolower($email2));

    #password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    #date 
    $date = date('Y-m-d');
    

    //start doing email checks
    if($email == $email2) {
        //check if email is invalid format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //check if emails already exist
            $email_check = mysqli_query($con,"SELECT email FROM users WHERE email='$email'");

            //count num of rows returned
            $num_rows = mysqli_num_rows($email_check);
            //check if more than 0 rows 
            if($num_rows > 0) {
                array_push($error_array,"Email already in use<br>");
            }# end // check if email already in use.

        } else {
            array_push($error_array,"invalid email format<br>");
        }//enf of filtervar check else

    } else {
        array_push($error_array,"Emails dont match<br>");
    }


    //check names length

    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array,"First Name must be between 2 and 25 characters<br>");
    }

    // last name check length
    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array,"Last Name must be between 2 and 25 characters<br>");
        
    }


    //password length and dont match
    if($password != $password2) {
        array_push($error_array,"passwords do not match<br>");
    } else {
        //regualar expression
        if(preg_match("/[^A-Za-z0-9]/", $password)) {
            array_push($error_array,"Your password can only contain english characters and numbers<br>");
        }
    }

    //
    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array,"Your password must be bewteen 5 and 30 characters<br>");
    }

    #send data to database if no errors
    if(empty($error_array)) {

        $password = md5($password);//encrypts password 

        $username = strtolower($fname . "_". $lname);
        $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
       
        $i = 0;
        #if username exists add one to end
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
        }


        //profile pic assigment
        $rand = rand(1,2);

        if($rand == 1) {
            $profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";
        }
        else {
            $profile_pic = "assets/images/profile_pics/defaults/head_carrot.png";
        }


        //insert into database
        $query = mysqli_query($con,"INSERT INTO users VALUES ('','$fname','$lname','$username','$email','$password','$date','$profile_pic','0','0','no',',')");
        //success message
        array_push($error_array,"<span style='color:#14c800;'>Your are all set. Go ahead and login.</span><br>");

        //clear session array
        $_SESSION['reg_fname'] = '';
        $_SESSION['reg_lname'] = '';
        $_SESSION['reg_email'] = '';

    }// end of error array empty


}
