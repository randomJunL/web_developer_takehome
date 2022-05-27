<?php

require_once('db.php');

class Requester extends Database{

    public function __construct(string $configName, string $configPath)
    {
        parent::__construct($configName, $configPath);


    }


    public function getAllEntries(){
        $query = "SELECT * FROM REQUESTER";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEntry($firstname, $lastname, $email){
        if(($this->checkExistence($email))){
            throw new RuntimeException("Email: $email already exists");
        }
        $query = "INSERT INTO REQUESTER (FirstName, LastName, Email) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->execute([$firstname, $lastname, $email]);
    }

    private function checkExistence($email){
        $query = "SELECT * FROM REQUESTER WHERE Email = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$email]);

        return !empty($statement->fetch(PDO::FETCH_ASSOC));
    }


}