<?php

    require_once('includes/header.php');


    $preview = new PreviewProvider($con,$userLoggedIn);
    echo $preview->createTVshowPreviewVideo();

    $containers = new CategoryContainers($con,$userLoggedIn);
    echo $containers->showTVShowCategories();

?>