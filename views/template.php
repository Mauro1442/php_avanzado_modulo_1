<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= stylesheet href="./public/css/styles.css">
    <title>Document</title>
</head>
<body>
    <div id="container" >
        <header>
            <br>
            <nav id="main-menu">
                <ul>
                    <li><a href="index.php?route=signin">Sign In</a></li>
                    <li><a href="index.php?route=login">Login</a></li>
                    <li><a href="index.php?route=home">Home</a></li>
                    <li><a href="index.php?route=logout">Logout</a></li>
                </ul>
            </nav>
            <div id="content">
            </div>
        </header>
        <section id="content">
            <?php 
            if (isset($_GET["route"])) {
                if (
                    $_GET["route"] == "signin" ||
                    $_GET["route"] == "login" ||
                    $_GET["route"] == "home" ||
                    $_GET["route"] == "logout" ) {
                        include "pages/".$_GET["route"].".php";
                } else {
                    include "pages/error404.php";
                }
            } else {
                include "pages/signin.php";
            }
            ?>
        </section>
    </div>
</body>
</html>