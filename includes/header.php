<?php
    require_once("includes/classes/PreviewProvider.php");
    require_once("includes/classes/Entity.php");
    require_once('includes/config.php');

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
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
        
    </div>