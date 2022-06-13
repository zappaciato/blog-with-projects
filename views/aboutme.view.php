<?php
session_start(); // session stat needs to be on top otherwise it will display the nav bar as for a unlogged user;
include_once "navbar.view.php";

?>
<link rel="stylesheet" href="style.css">


<div style="display: flex; justify-content: center; align-items: center; width: 100vw; height: 100vh;">
    <h1>This section is under construction and will be about:
        <?php echo $_SESSION["useremail"] ?>

    </h1>
</div>