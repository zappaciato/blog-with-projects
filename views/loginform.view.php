<link rel="stylesheet" href="../style.css">

<?php
include_once "navbar.view.php";
?>

<section class="main-section">
    <div class="login-container">
        <form class="form-container" action="../includes/login.php" name="login" method="post">
            <label for="login">Login</label>
            <input type="text" name="useremail" placeholder="Your email....">
            <input type="password" name="pwd" placeholder="Your password....">
            <button id="login-getIn-btn" type="submit" name="submit">Get In</button>
        </form>

        <!-- //displaying alert error messages @copyright Kris -->
        <?php

        $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullURL, "error=usernotfound") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        User not found. 
                    </h3>
                </div>';
        }

        if (strpos($fullURL, "error=wrongpassword") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        Wrong password.
                    </h3>
                </div>';
        }

        if (strpos($fullURL, "error=emptyinputus") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        Your input is empty. 
                    </h3>
                </div>';
        }

        ?>

    </div>
</section>