<?php
    require_once("PayPal-PHP-SDK/autoload.php");
    // After Step 1
    $apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential(
        'AZhZR117lOiim0cjUm5rkaYZxZ7B2j4D7y6MEbKwQjlOJZBJK9j8U4A5E7wRIHl-JAu6sYntAdArMb0d',     // ClientID
        'EACvn9q5-UVQgkgHf3CUwnf2RgO-VZ57Q3OsjToKCtETtkOnS7UhXR9UuBzUtYrqvdyeMqAjFSG_qy1i'      // ClientSecret
    )
    );
?>