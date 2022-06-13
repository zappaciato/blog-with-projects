<?php
//Here we put all the classes realted to changing the database
include_once "../classes/signup.classes.php";
include_once "../classes/log.classes.php";
class loginController extends Login
{

    //the password and username should be private or protected; I am getting an error if I change it. To take a look and fix it. 
    public $useremail;
    public $pwd;


    // create the constructor
    public function __construct($useremail, $pwd)
    {
        $this->useremail = $useremail;
        $this->pwd = $pwd;
    }


    public  function loginUser()
    {
        if ($this->emptyInput() == false) {
            // echo "Empty Input";
            header("location: ../views/loginform.view.php?error=emptyinputus");
            exit();
        }
        //initiate the getUser function with these credentials
        $this->getUser($this->useremail, $this->pwd);
    }


    // errorhandlers

    // check if there was any empty input;
    private function emptyInput()
    {
        $flag = true; // here we will store true if ok and flase if not OK. Just declaring it $flag; doesn't work here for me; 
        if (empty($this->useremail) || empty($this->pwd)) {
            //if the user has not submitted all the data, some of it will be missing here so
            $flag = false;
        } else {
            $flag = true;
        }
        // we have to remember to return the data
        return $flag;
    }
}
