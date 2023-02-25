<?php

    require_once('includes/header.php');


    $preview = new PreviewProvider($con,$userLoggedIn);
    echo $preview->createTVshowPreviewVideo(null);

    $containers = new CategoryContainers($con,$userLoggedIn);
    echo $containers->showTVShowCategories();

?>