<?php
    require_once('includes/config.php');
    require_once("includes/classes/PreviewProvider.php");
    require_once("includes/classes/CategoryContainers.php");
    require_once("includes/classes/Entity.php");
    require_once("includes/classes/EntityProvider.php");
    require_once("includes/classes/ErrorMessage.php");
    require_once("includes/classes/SeasonProvider.php");
    require_once("includes/classes/Season.php");
    require_once("includes/classes/Video.php");
    require_once("includes/classes/VideoProvider.php");
    require_once("includes/classes/User.php");

    if(!isset($_SESSION['userLoggedIn'])){
        header("Location: register.php");
    }

    $userLoggedIn = $_SESSION['userLoggedIn'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/887957b409.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
    <?php
        if(!isset($hideNav)){
            include_once("includes/navbar.php");
        }
    ?>

