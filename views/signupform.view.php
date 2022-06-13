<?php
include_once "./navbar.view.php"
?>

<link rel="stylesheet" href="../style.css">

<section class="main-section">
    <div class="signup-container">
        <form class="form-container" action="../includes/registration.php" name="signup" method="post">
            <label for="register">Registration</label>
            <input type="text" name="useremail" placeholder="Your email....">
            <input type="password" name="pwd" placeholder="Your password....">
            <input type="password" name="pwdRepeat" placeholder="Repeat Your password....">
            <button id="register-btn" type="submit" name="submit">Register</button>
        </form>

        <!-- //displaying alert error messages @copyright Kris :) -->
        <?php

        $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullURL, "error=emptyinputus") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        Your input is empty. 
                    </h3>
                </div>';
        }

        if (strpos($fullURL, "error=invalidemail") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        Your email is invalid.
                    </h3>
                </div>';
        }

        if (strpos($fullURL, "error=passwordsincorrect") == true) {
            print
                '<div class="popup-msg-wrapper">
                    <h3 class="popup-message">
                        Your password is incorrect.
                    </h3>
                </div>';
        }

        // if (strpos($fullURL, "error=invalidemail") == true) {
        //     print
        //             '<div class="popup-msg-wrapper">
        //                 <h3 class="popup-message">
        //                     Empty input error. Please fill out all the details.
        //                 </h3>
        //             </div>';
        // }
        
        ?>

</section>

</body>

<script type="text/javascript">
//some js to implement
</script>


</html>