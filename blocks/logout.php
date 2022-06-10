<?php 
    $_SESSION["status"]="";
    unset($_SESSION["status"]);
    session_unset();
    header("location: index.php");
?>