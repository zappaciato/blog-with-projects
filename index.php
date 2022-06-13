<!-- session has to be included in the main file otherwise we won't see the changes when we are logged in - Kris -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts  Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">

    <title>Training Page - Kris</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once "views/navbar.view.php"; ?>

    <?php include_once "views/homepage.php"; ?>

</body>



<script type="text/javascript">
    // Solution to the problem of the page scrolling up on refresh;
    window.onunload = function() {
        window.scrollTo(0, 0);
    }

</script>


</html>