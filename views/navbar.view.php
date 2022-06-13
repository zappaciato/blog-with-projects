<link rel="stylesheet" href="../style.css">

<!-- Here we change the nav view depending if you are logged in or not -->
<?php


// Navbar section when the user is logged in:
if (isset($_SESSION["useremail"])) {
?>
    <nav id="nav-bar-section">
        <div class="nav-bar">
            <a id="logo-nav-bar" href="../index.php">
                <img id="logo-icon" src="../photos/svgator-seeklogo.com.svg" alt="My Logo">
            </a>


            <div class="menu-tab">
                <a href="../views/aboutme.view.php">About me</a>
            </div>
            <div class="menu-tab">
                <a href="#">Projects</a>
                <!-- Here should be a drip down list with: 
                : Add a post form
                : Calculator
                : other projects/games -->
            </div>
            <div class="menu-tab">
                <a href=" ../views/psc.game.view.php">PSC Game</a>
            </div>
            <div class="menu-tab">
                <a href="#">Fotos</a>
            </div>

            <!-- Search bar HTML -->
            <div class="search-bar">
                <input id="search-input" type="text" placeholder="search...">
            </div>

            <!-- Login Logout buttons -->
            <div class="nav-log-btns">
                <!-- Temporairly the logged user will be displayed here -->
                <button id="logged-btn" class="btn-style"> <a href="#"> <?php echo $_SESSION["useremail"] ?> </a> </button>
                <button id="logout-btn" class="btn-style"> <a href="/includes/logout.php"> Logout </a></button>
            </div>

        </div>
    </nav>
<?php

} else {
    // Navbar section when the user isn't logged in. 
?>
    <nav id="nav-bar-section">
        <div class="nav-bar">
            <a id="logo-nav-bar" href="../index.php">
                <img id="logo-icon" src="../photos/svgator-seeklogo.com.svg" alt="My Logo">
            </a>

            <div class="nav-log-btns">
                <button id="signup-btn" class="btn-style">
                    <a href="/views/signupform.view.php"> SignUp </a> </button>
                <button id="login-btn" class="btn-style">
                    <a href="/views/loginform.view.php"> Login </a> </button>
            </div>
        </div>
    </nav>

<?php
}
?>

<!-- //js to do sticky navbar -->
<script>

    //private note
    //jezeli chce klikalny button to musze uzyc js
    //albo zmienic buttony na div z linkiem;

    window.onscroll = function() {
        glueNavBar()
    };

    var navbar = document.getElementById("nav-bar-section");
    var sticky = navbar.offsetTop;

    function glueNavBar() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    // this function prevents the page from scrolling down on refresh. Every time you refres it will jump to the top. 
    window.onunload = function() {
        window.scrollTo(0, 0);
    }
    
</script>