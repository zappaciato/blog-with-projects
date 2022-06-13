<?php
//This controller controls the data of the game. The data will then be saved in the database;



//Here we put all the classes realted to changing the database
include_once "../classes/pscgame.classes.php";
include_once "../classes/log.classes.php";
class pscGameResultsController extends GameData
{

    public $numAttempts;
    public $numWins;
    public $numLosses;
    public $numDraws;

    // create the constructor
    public function __construct($useremail, $numAttempts, $numWins, $numLosses, $numDraws)
    {

    $this->useremail = $useremail;
    $this->numAttempts = $numAttempts;
    $this->numWins = $numWins;
    $this->numLosses = $numLosses;
    $this->numDraws = $numDraws;

        
    }

    public function pscGameData ()
    {
        
        $this->getGameData($this->useremail, $this->numAttempts, $this->numWins,$this->numLosses,$this->numDraws);

    }

    // errorhandlers

}
