<?php

//Here we put all the classes realted to changing the database
include_once "../classes/signup.classes.php";
class signupController extends Signup{

    //first define the variables// Should be private or protected? Does not work in my settings -> to be investigated;
    public $useremail;
    public $pwd;
    public $pwdRepeat;

    // create the constructor for the login data
    public function __construct($useremail, $pwd, $pwdRepeat) {
        $this->useremail = $useremail;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    // errorhandlers

    // check if there was any empty input;
    private function emptyInput() {
        $flag = true; // here we will store true if ok and flase if not OK. 
        if(empty($this->useremail) || empty($this->pwd) || empty($this->pwdRepeat)) {
            //if the user did not submit all the data some of it will be missing here so
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;
    }

        
// good to implement a method that checks the characters for example preg_match(characteres list, $this->email)

    // this method checks if the email is written correctly
    private function invalidEmail () {
        $flag = true;  
        if(!filter_var($this->useremail, FILTER_VALIDATE_EMAIL)) {
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;

    }

    // Here we make sure the passwords are the same
    private function pwdMatch() {
        $flag = true; 
        if ($this->pwd !== $this->pwdRepeat) {
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;
    }

    //check if there are identical users already // DOUBLE USER
    // private function userMatch()
    // {
    //     $flag = true; 
    //     if (!$this->checkUser($this->useremail)) {
    //         $flag = false;
    //     } else {
    //         $flag = true;
    //     }
    //     return $flag;
    // }

    // Now we want to sign up (register) the new user if none of the above error handlers is run. 
    public  function signupUser() { 
        
        if($this->emptyInput() == false) {
            // echo "Empty Input";
            
            header("location: ../views/signupform.view.php?error=emptyinputus");
            exit();
        }

        if ($this->invalidEmail() == false) {
            // echo "Invalid Email";
            header("location: ../views/signupform.view.php?error=invalidemail");
            exit();
        }

        if ($this->pwdMatch() == false) {
            // echo "Passwords don't match!";
            header("location: ../views/signupform.view.php?error=passwordsincorrect");
            exit();
        }

        // if($this->userMatch() == false) {
        //     // echo "Empty Input";
        //     header("location: ../views/signupform.view.php?error=usersalreadyexists");
        //     exit();
        // }

        
            
        // actual user signup (register): set user in the database;
        $this->setUser($this->useremail, $this->pwd);
    }
}