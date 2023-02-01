<?php
    if(isset($_POST['submitButton'])){
        echo "form was submitted";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="assets/images/logo.png" title="logo" alt="logo">
                <h3>Sign In</h3>
                <span>to continue to Netflix</span>
                
            </div>
            <form method="POST">
                <input type="text" name='userName' placeholder='User Name' required>
                <input type="password" name='password' placeholder='Password' required>
                <input type="submit" name='submitButton' value="SUBMIT">
            </form>
            <a href="register.php" class='signUpMessage'>Need an account ? Sign Up here!</a>
        </div>
    </div>
</body>
</html>
