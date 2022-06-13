<?php
//Here we put all the classes realted to the connection with database
include_once "../classes/dbh.classes.php";
include_once "../classes/signup-controller.classes.php";
include_once "../classes/login-controller.classes.php";
include_once "../classes/log.classes.php";


//database connection

class Login extends Dbh
{
    //signing up a new user
    //authenticate user
    public function getUser($useremail, $pwd)
    {
        //we need to get into the database and grab the data which the user siged up with
        //first we verify the password;
        //use prepared statement to get the password for the user with given email
        $statement = $this->connectToDb()->prepare('SELECT user_password FROM users_loginsys_php WHERE user_email = :user_email');
        $statement->bindParam(':user_email', $useremail);
        $this->useremail = $useremail;

        //execute the statement and check if the statement has been successful;
        if (!$statement->execute()) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        } else {
            header("location: ../index.php?loggedSuccess"); 
        }
       
        // registering logs
        // Logs::printLog($statement->rowCount());  
        // Shows correctly the number of rows. 
        
        //checking how many rows it will throw. If zero then there's nobody in the DB with these credentials;
        if ($statement->rowCount() == 0) {
            $statement = null;
            header("location: ../views/loginform.view.php?error=usernotfound");
            exit();
        }

        //now we are fetching the hashed password from the database; and we want it in a form of associative array;
        $pwdHashed = $statement->fetchAll(PDO::FETCH_ASSOC);

        //because we fetch an associative array we have to get into the correct data.  
        $checkPwd = password_verify($pwd, $pwdHashed[0]["user_password"]); //this will return true or flase
        
        if($checkPwd == false) {
            $statement = null;
            header("location: ../views/loginform.view.php?error=wrongpassword");
            exit();
        
        } elseif ($checkPwd == true) {
        //use prepared statement to see all the records with these credentials
            $statement = $this->connectToDb()->prepare("SELECT * FROM users_loginsys_php WHERE user_email = :user_email AND user_password = :user_password");

            $statement->bindParam(':user_email', $useremail);
            $statement->bindParam(':user_password', $pwdHashed[0]["user_password"]);

            if (!$statement->execute()) {
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            } else {
                header("location: ../index.php");
            }
            //there always should be one row for one unique user. 
            if ($statement->rowCount() == 0) {
                $statement = null;
                header("location: ../views/loginform.view.php?error=notFound");
                exit();
            } 
            //here we fetch the user's credentials using PDO for PHP OOP.. for functional there is MySQli
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);

            //start the session for the logged user;
            session_start();

            $_SESSION["usernumer"] = $user[0]["user_number"]; //to zwraca null w tej chwili
            $_SESSION["useremail"] = $user[0]["user_email"];

            //handy log (logs.txt) if the user is logged in;
            Logs::printLog(isset($_SESSION["useremail"]));
        }

        $statement = null; // clear the statement 
    }
}
