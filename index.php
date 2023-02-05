<h1>Index Page</h1>


<?php

require_once('includes/config.php');
if(!isset($_SESSION['userLoggedIn'])){
    header("Location: register.php");
}
?>