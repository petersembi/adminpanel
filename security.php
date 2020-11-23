<?php
session_start();

 include('dbconfig.php');
//$connection = mysqli_connect('localhost', 'root', '', 'adminpanel');

if($dbconfig)
{
    //echo "Database Connected";
}
else
{
    header ("Location: dbconfig.php");

}

if (!$_SESSION['username']) {
    header('Location: login.php');
}

?>