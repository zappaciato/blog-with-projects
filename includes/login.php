<?php

// First we check if the submited data is correct and it is already there

if (isset($_POST["submit"])) { //check if there is submit (the data is submitted) submit button attribute name;

    // grabbing the data form the submit
    $useremail = $_POST["useremail"]; //we grab user email 
    $pwd = $_POST["pwd"]; //we grab user email 
    
    //instantiate SignupController

    //refer to the DB class and other classes. In this order as they rely on eachother's methods;
    include_once "../classes/dbh.classes.php";
    include_once "../classes/login.classes.php";
    include_once "../classes/login-controller.classes.php"; //include the path to the right class (can be done in autoloader -> fix later)

    $login = new loginController($useremail, $pwd);

    //Run error handles
    $login->loginUser();

    //Go to the main page
    header("location: ../index.php?loggedSuccess");
};
