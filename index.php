<?php 
 include "blocks/connection.php";
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="menu">
            <a href="index.php?nav=home">
                <img src="./assets/phone-call.png" style="width: 30px; margin-top: 25px;">
            </a>
        </div>
        <div class="search">
            <form method="post">
                <input type="text" name="searchtext">
                <button type="submit" name="search">ძებნა</button>
            </form>
        </div>
        <div class="login" style="margin-top: 20px; height: 45px; display: flex; flex-direction: row;">
            <?php 
             if(isset($_SESSION) && isset($_SESSION["status"]) && $_SESSION["status"] == "authorized") {
              ?>
                    <a href="?nav=admin&page=login">
                        <p style="margin-right: 10px">Admin</p>
                        <img src="./assets/admin-with-cogwheels.png" style="width: 30px;">
                    </a>
                    <a href="?nav=logout" style="margin-left: 15px;">
                        <p style="margin-right: 10px">გამოსვლა</p>
                        <img src="./assets/logout.png" style="width: 30px;">
                    </a>
              <?php
            } else {
                ?>
                <a href="?nav=admin&page=login">
                    <p style="margin-right: 10px">შესვლა</p>
                    <img src="./assets/user.png" style="width: 30px;">
                </a>
              <?php
            }
            ?>
        </div>
    </div>
        <?php

            if(isset($_POST["search"])) {
                $searchtext = $_POST["searchtext"];
                header("location: index.php?nav=search&filter={$searchtext}");
            }
            if (isset($_GET["nav"]) && $_GET["nav"] == "admin") {
                include "blocks/admin.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "addcompany") {
                include "blocks/add-company.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "adm") {
                include "blocks/adm.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "add") {
                include "blocks/add.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "delete") {
                include "blocks/delete.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "edit") {
                include "blocks/edit.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "logout") {
                include "blocks/logout.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "search") {
                include "blocks/search.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "home") {
                include "blocks/home.php";
            } else {
                include "blocks/home.php";
            }
            ?>
    </div>
    </div>
</body>

</html>