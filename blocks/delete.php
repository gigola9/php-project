<?php 
    $id = $_GET["id"];
    $delete = "DELETE FROM phones WHERE id='$id'";
    if(mysqli_query($connection, $delete)) {
        header("location: index.php?nav=home");
    }
?>