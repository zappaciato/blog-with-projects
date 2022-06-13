<?php
// opens the connection to the database;
class Dbh {
    protected function connectToDb() {

        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=loginsystem_php', $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error connecting to the Db!" . $e->getMessage() . "<br/>";
            die(); //breaks the connection
        }


    }
}