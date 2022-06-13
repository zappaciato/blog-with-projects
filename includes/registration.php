<?php

// First we check if the submited data is correct and it is there

if(isset($_POST["submit"])) { //check if there is submit (the data is submitted) from the name of submit button attribute name;
    
    // grabbing the data form the submit
    $useremail = $_POST["useremail"]; //we grab user email 
    $pwd = $_POST["pwd"]; //we grab user password 
    $pwdRepeat = $_POST["pwdRepeat"]; //we grab user email 

    
    //instantiate SignupController

    //refer to the DB class and other classes. In this order as they rely on eachother's methods;
    include_once "../classes/dbh.classes.php";
    include_once "../classes/signup.classes.php";
    include_once "../classes/signup-controller.classes.php"; //include the path to the right class (can be done in autoloader)
    
    $newUser = new signupController($useremail, $pwd, $pwdRepeat);
    
    //Run error handles
    $newUser->signupUser();
    
    //Go to the main page
    // header("location: ../index.php?error=none");
    // header(var_dump($newUser));
    
    
};


