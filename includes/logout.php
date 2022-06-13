<?php 

session_start(); //session has to be started to be destroyed later
session_unset(); //to unset all the session variables
session_destroy(); // end of session

//going back to the front page
header("location: ../index.php?logOutDone");