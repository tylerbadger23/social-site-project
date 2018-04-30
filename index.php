<?php 

include "includes/header.php";

if(isset($_SESSION['username'])) {
    $user_logged_in = $_SESSION['username'];
} else {
    header("Location: login.php");
}

?>






</body>
</html>