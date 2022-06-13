<?php

//Here we put all the classes realted to the connection with database
include_once "../classes/dbh.classes.php";
include_once "../classes/signup-controller.classes.php";


class Signup extends Dbh {

    //signing up a new user
    public function setUser($useremail, $pwd) {
        $statement = $this->connectToDb()->prepare("INSERT INTO users_loginsys_php (user_email, user_password) VALUES (:user_email, :user_password);");

        // before we run the statement we need to hash the password;
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        $statement->bindParam(':user_email', $useremail);
        $statement->bindParam(':user_password', $hashedPwd);
        
        //pass the data from the form into the query
        $this->useremail = $useremail;
        $this->hashedPwd = $hashedPwd;
        
        //execute the statement and check if the statement has been successful;
        if (!$statement->execute()) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }   else {
            header("location: ../index.php");
        };
        $statement = null; // clear the statement 
    }









    
    // Now let's check if the user  already exist in the database // DOUBLE USER PREVENTION

    // protected function checkUser($useremail) {
    //     $statement = $this->connectToDb()->prepare('SELECT user_email FROM users_loginsys_php WHERE user_email = ?;'); //the questions mark works as a placeholder for the $useremail; We assign the data later after the query has been run. It prevents querry injections (hacking);
    //     $statement->bindParam('?', $useremail);
    //     //check if the statement failed; method execute()- as parameter it takes the ? from the statement. If there were more, we would need to create an array. execute(array[$one, $two]);
    //     if(!$statement->execute()) { 
    //         $statement = null; //delete the statement
    //         header("location: ../index.php?error=statementfailed");
    //         exit(); //exit the entire script;
    //     }
    //     // now we can check if there were any results, so if there was a user with the same email already in the DB. 
    //     $resultCheck = false;

    //     if($statement->rowCount() > 0) { //rowCount() - check how many rows have been returned. So at least one and it means there's a user already; 
    //         $resultCheck = false;
    //     } else {
    //         $resultCheck = true;
    //     }
    //     return $resultCheck;
    // }
}