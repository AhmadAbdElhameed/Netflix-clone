<?php
    require_once("includes/header.php");

?>


<div class="settingsContainer column">
    <div class="formSection">
        <form method="POST">
            <h2>User Details</h2>
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="email" name="email" placeholder="Email">

            <input type="submit" name="saveDetailsButton" value="Save">
        </form>
    </div>
    <div class="formSection">
        <form method="POST">
            <h2>Update Password</h2>
            <input type="password" name="oldPassword" placeholder="Old Password">
            <input type="password" name="newPassword" placeholder="New Password">
            <input type="password" name="newPassword2" placeholder="Confirm New Password">

            <input type="submit" name="savePasswordButton" value="Update">
        </form>
    </div>
</div>