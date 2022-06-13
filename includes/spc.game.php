<?php

//check if the cookie is set -> not sure if this is the proper way to do this: Better use AJAX; -> to work on it in the next step;
if (isset($_COOKIE["numbers"])) {

     // grabbing the data form the cookie
    $numAttempts = $_COOKIE["numbers"];
    $numWins = $_COOKIE["wins"];
    $numLosses = $_COOKIE["losses"];
    $numDraws = $_COOKIE["draws"];

    //instantiate spc.game.controller

    //refer to the DB class and other classes. In this order as they rely on eachother's methods;
    include_once "../classes/dbh.classes.php";
    include_once "../classes/pscgame.classes.php";
    include_once "../classes/pscgame-controller.classes.php"; //include the path to the right class (can be done in autoloader)

    $getData = new pscGameResultsController($useremail, $numAttempts, $numWins, $numLosses, $numDraws);


    //Run error handles
    $getData->pscGameData();

    //Go to the main page
    header("location: ../psc.game.view.php");
};
