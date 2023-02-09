<h1>Index Page</h1>


<?php
    require_once("includes/classes/PreviewProvider.php");
    require_once("includes/classes/Entity.php");
    require_once('includes/config.php');

    if(!isset($_SESSION['userLoggedIn'])){
        header("Location: register.php");
    }

    $userLoggedIn = $_SESSION['userLoggedIn'];

    $preview = new PreviewProvider($con,$userLoggedIn);
    echo $preview->createPreviewVideo(null);

?>