<?php


session_start();

 $connection = mysqli_connect("localhost", "root", "", "adminpanel");

if(isset($_POST['registerbtn'])) {
    echo "isset";
    $username = $_POST['username'];
    $email = $_POST['email'];  
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password===$cpassword) {
                $query = "INSERT INTO register (username, email, password) VALUES ('$username', '$email','$pwd');";
                $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                $_SESSION['success']= "Admin Profile Added";
                header('Location: register.php');
            } else {
                $_SESSION['status']= 'Admin Profile not added';
                header('Location: register.php');
            }
    } else {
        $_SESSION['status']= 'Password and Confirm Password Does Not Match';
                header('Location: register.php');
    }

    
    
}


?>