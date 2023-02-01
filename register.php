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
                <h3>Sign Up</h3>
                <span>to continue to Netflix</span>
                
            </div>
            <form method="POST">
                <input type="text" name='firstName' placeholder='First Name' required>
                <input type="text" name='lastName' placeholder='Last Name' required>
                <input type="text" name='userName' placeholder='User Name' required>
                <input type="email" name='email' placeholder='Email Address' required>
                <input type="email" name='confirm_email' placeholder='Confirm Email Address' required>
                <input type="password" name='password' placeholder='Password' required>
                <input type="password" name='confirm_password' placeholder='Confirm Password' required>
                <input type="submit" name='submitButton' value="SUBMIT">
            </form>
            <a href="login.php" class='signInMessage'>Already have an account ? Sign In here!</a>
        </div>
    </div>
</body>
</html>
