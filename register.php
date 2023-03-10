<?php

    require_once('includes/classes/FormSanitizer.php');
    require_once('includes/classes/Account.php');
    require_once('includes/classes/Constants.php');
    require_once('includes/config.php');

    $account = new Account($con);

    if(isset($_POST['submitButton'])){
        $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
        $lastName = FormSanitizer::sanitizeFormString($_POST['lastName']);
        $userName = FormSanitizer::sanitizeFormUsername($_POST['username']);
        $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
        $confirm_email = FormSanitizer::sanitizeFormEmail($_POST['confirm_email']);
        $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
        $confirm_password = FormSanitizer::sanitizeFormPassword($_POST['confirm_password']);

        $success = $account->register($firstName,$lastName,$userName,$email,$confirm_email,$password,$confirm_password );

        if($success){
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }

        // echo $firstName . "<br>";
        // echo $lastName . "<br>";
        // echo $userName . "<br>";
        // echo $email . "<br>";
        // echo $confirm_email . "<br>";
        // echo $password . "<br>";
        // echo $confirm_password . "<br>";
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText); // replace space with "" before text or after
        //$inputText = trim(" ","",$inputText);
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }

    function getInputValue($value){
        if(isset($_POST[$value])){
            echo $_POST[$value];
        }
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
                <?php echo $account->getError(Constants::$firstNameCharacters) ?>
                <input type="text" name='firstName' value="<?php getInputValue('firstName') ?>" placeholder='First Name' required>

                <?php echo $account->getError(Constants::$lastNameCharacters) ?>
                <input type="text" name='lastName' value="<?php getInputValue('lastName') ?>" placeholder='Last Name' required>

                <?php echo $account->getError(Constants::$usernameCharacters) ?>
                <?php echo $account->getError(Constants::$usernameTaken) ?>
                <input type="text" name='username' value="<?php getInputValue('username') ?>" placeholder='Username' required>

                <?php echo $account->getError(Constants::$emailsDonotMatch) ?>
                <?php echo $account->getError(Constants::$emailInvalid) ?>
                <?php echo $account->getError(Constants::$emailTaken) ?>
                <input type="email" name='email' value="<?php getInputValue('email') ?>" placeholder='Email Address' required>
                <input type="email" name='confirm_email' value="<?php getInputValue('confirm_email') ?>"  placeholder='Confirm Email Address' required>

                <?php echo $account->getError(Constants::$passwordsDonotMatch) ?>
                <?php echo $account->getError(Constants::$passwordLength) ?>
                <input type="password" name='password' placeholder='Password' required>
                <input type="password" name='confirm_password' placeholder='Confirm Password' required>
                <input type="submit" name='submitButton' value="SUBMIT">
            </form>
            <a href="login.php" class='signInMessage'>Already have an account ? Sign In here!</a>
        </div>
    </div>
</body>
</html>
