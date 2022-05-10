<?php

require_once('Database.php');


// Inherited from the Database
class Requester extends Database{

    public function __construct(string $configName, string $configPath)
    {
        parent::__construct($configName, $configPath);

    }
    
    public function getWholeRequester(){
        $query = "SELECT * FROM REQUESTER";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertRequester($firstname, $lastname, $email){
        $query = "INSERT INTO REQUESTER (FirstName, LastName, Email) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->execute([$firstname, $lastname, $email]);
    }

    public function deleteRequester($email) {
        $query = "DELETE FROM REQUESTER WHERE EMAIL = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$email]);
    }

}

