<?php
//this section is under construction


//Here we put all the classes realted to the connection with database
include_once "../classes/dbh.classes.php";
include_once "../classes/pscgame-controller.classes.php";
include_once "../classes/log.classes.php";

//database connection
class GameData extends Dbh {


    //te argumenty nie są potrzebne do tego oprzcz useremail
    public function getGameData ($useremail, $numAttempts, $numWins, $numLosses, $numDraws)
    {

        $statement = $this->connectToDb()->prepare('SELECT :u.user_email, :g.attempts, :g.wins, :g.losses, :g.draws FROM users_loginsys_php AS u
        JOIN spc_game_results AS g ON g.user_number = u.user_number;');

        //prepared statement to fetch the game results data from the db;
        $statement = $this->connectToDb()->prepare(
            'SELECT 
            u.user_email = :user_email, 
            g.attempts = :attempts, 
            g.wins = :wins, 
            g.losses = :losses, 
            g.draws = :draws 
            FROM users_loginsys_php AS u
            JOIN spc_game_results AS g ON g.user_number = u.user_number;'
        );

        $statement->bindParam(':user_email', $useremail);
        $statement->bindParam(':g.attempts', $numAttempts);
        $statement->bindParam(':wins', $numWins);
        $statement->bindParam(':losses', $numLosses);
        $statement->bindParam(':draws ', $numDraws);

        //niepotrzebne

        $this->numAttempts = $numAttempts;
        $this->numWins = $numWins;
        $this->numLosses = $numLosses;
        $this->numDraws = $numDraws;

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../psc.game.view=statementfailed");
            exit();
        } else {
            header("location: ../psc.game.view"); 

    }

    $gameResults = $statement->fetchAll(PDO::FETCH_ASSOC);
    //we need an if statement to show data only for logged in users;
//tutaj trzeba gdzies ifa zeby tylko dla usera z sesji pokazac dane

    // echo $gameResults[0]['wins'];
    // Logs::printLog($gameResults);
}
}