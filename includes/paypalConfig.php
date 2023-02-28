<?php
    require_once("PayPal-PHP-SDK/autoload.php");
    // After Step 1
    $apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential(
        'AfbYapMkneIu27C_1Awg_1BZJD2AFiP3ua6gVi6P5WO5e1YW0I9LkSzIn_BvMpP5NFtrNMFXjPIbYdbb',     // ClientID
        'ELhkhJlojAIFn01MYClxqwQoTHdVgF5SIf5IvLu7_TTrpPenTuIkHDCQ7MEA1IAVkLHbYOvNeLZHsHFD'      // ClientSecret
    )
    );
?>